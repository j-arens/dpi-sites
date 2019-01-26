<?php

namespace Spine\Scripts\PHP;

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
                    'likes' => $this->fetchLikes($post->id, $accessToken)
                ];
            }, array_splice($res->data, 0, $quantity));
        }
        
        return [];
    }
}