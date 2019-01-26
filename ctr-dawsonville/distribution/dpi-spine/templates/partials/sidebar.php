<?php 

    function dpiListSidebarNews() {
        $list = '<ul class="sidebar__parish-news_list">';

        $posts = get_posts([
            'post_type' => 'parish-news',
            'numberposts' => 4
        ]);

        if (empty($posts)) {
            $list .= '<li class="sidebar__parish-news_list-item">News coming soon!</li>';
        } else {
            foreach($posts as $post) {
                $list .= '
                    <li class="sidebar__parish-news_list-item">
                        <a href="' . get_the_permalink($post->ID) . '" class="sidebar__parish-news_link">' . get_the_title($post) . '</a>
                    </li>
                ';
            }
        }

        return $list . '</ul>';
    }

    $links = dpiGetSidebarLinks();

?>

<aside class="sidebar">
    <div class="sidebar__parish-news">
        <h3 class="sidebar__title">Parish News</h3>
        <?php echo dpiListSidebarNews() ?>
    </div>
    <div class="sidebar__btns">
        <h3 class="sidebar__title">Quick Links</h3>
        <a href="<?=$links[0]?>" class="sidebar__btns-link pulse-btn-lt">
            <?php get_template_part('svg/giving-circle-white') ?>
            <p class="sidebar__btns-link_title">Online Giving</p>
        </a>
        <a href="<?=$links[1]?>" class="sidebar__btns-link pulse-btn-lt">
            <?php get_template_part('svg/bible-circle-white') ?>
            <p class="sidebar__btns-link_title">Daily Reading</p>
        </a>
        <a href="<?=$links[2]?>" class="sidebar__btns-link pulse-btn-lt">
            <?php get_template_part('svg/group-circle-white') ?>
            <p class="sidebar__btns-link_title">Join the parish</p>
        </a>
    </div>
</aside>
