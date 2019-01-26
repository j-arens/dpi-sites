<?php

namespace Spine\scripts\php;

class PageHeader {

    public function getTitle() {
        $title = '<h1 class="page-header__title font-medium">';

        if (is_search()) {

            $title .= 'Search: ' . get_search_query();

        } else if (is_404()) {

            $title .= 'Not Found';

        } else if (is_archive()) {

            $title .= ucfirst(get_post_type()) . ' Archive';

        } else if (is_home()) {

            $title .= 'News & Events';

        } else {

            $title .= get_the_title();
        }

        return $title . '</h1>';
    }

    public function getFeaturedImg() {
        if (is_home()) return '';

        $featuredImg = get_the_post_thumbnail_url();

        if (empty($featuredImg)) return '';

        return $featuredImg;
    }

}