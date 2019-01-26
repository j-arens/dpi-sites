<?php 

class FacebookFeed {
    
    private $appID = '1890534114543725';
    private $appSecret = '7831244359dec6cddae168a0a587f960';
    
    private function fetchUrl($url) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        
        $res = curl_exec($ch);
        curl_close($ch);
        
        return $res;
    }
    
    private function fetchToken() {
        $res = $this->fetchUrl(
            'https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id=' . $this->appID . '&client_secret=' . $this->appSecret  
        );
        
        return json_decode($res)->access_token;
    }
    
    private function fetchLikes($postID, $accessToken = false) {
        if (!$accessToken) $accessToken = $this->fetchToken();
        
        $res = $this->fetchUrl(
            'https://graph.facebook.com/' . $postID . '/likes?summary=true&access_token=' . $accessToken
        );
        
        return json_decode($res)->summary->total_count;
    }
    
    private function parseContent($post) {
        if (property_exists($post, 'message')) {
            return $post->message;
        } else if (property_exists($post, 'story')) {
            return $post->story;
        }
        
        return '';
    }
    
    public function fetchPosts($pageID, $quantity = 10) {
        $accessToken = $this->fetchToken();
        
        $res = json_decode($this->fetchUrl(
            'https://graph.facebook.com/' . $pageID . '/posts?access_token=' . $accessToken
        ));
        
        if (!empty($res)) {
            return array_map(function($post) {
                return [
                    'content' => $this->parseContent($post),
                    'date' => $post->created_time,
                    'likes' => $this->fetchLikes($post->id, $accessToken),
                    'link' => '//facebook.com/' . $post->id
                ];
            }, array_splice($res->data, 0, $quantity));
        }
        
        return [];
    }
}

?>

<?php 

    $fbFeed = new FacebookFeed();
    $posts = $fbFeed->fetchPosts('246869428841873', 4);
        
?>

<section class="fb-feed mw-container">
    <h2 class="fb-feed__heading">
        Facebook Messages
        <a href="#" class="fb-feed__heading-link" target="_blank" rel="noopener">Follow</a>
    </h2>
    <?php if(!empty($posts)): ?>
        <ul class="fb-feed__list">
            <?php foreach($posts as $post) { ?>
                <li class="fb-feed__item">
                    <a href="<?= $post['link'] ?>" class="fb-feed__link" target="_blank" rel="noopener">
                        <time class="fb-feed__date">
                            <?= date('m/j/Y', strtotime($post['date'])) ?>
                        </time>
                        <p class="fb-feed__excerpt">
                            "<?= wp_trim_words($post['content'], 10, '...') ?>"
                        </p>
                        <div class="fb-feed__likes">
                            <?= get_template_part('svg/facebook-like') ?>
                            <span class="fb-feed__likes-total">
                                <?= $post['likes'] ?>
                            </span>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php else: ?>
        <p class="fb-feed__empty">Sorry, there aren't any posts to show you right now.</p>
    <?php endif; ?>
</section>