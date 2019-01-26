<?php 

    require_once get_template_directory() . '/scripts/php/search-walker.php';

    function quickLinks() {
        $buttons = '';
        $dom = new DOMDocument;

        $quickLinks = wp_nav_menu([
            'menu' => 'search-quick-links',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'theme_location' => 'search_quick_links',
            'menu_class' => '',
            'items_wrap' => '%3$s',
            'depth' => 1,
            'echo' => false,
            'walker' => new DPI_Search_Walker()
        ]);

        if ($quickLinks) {
            $dom->loadHTML($quickLinks);
            $links = $dom->getElementsByTagName('a');

            $count = 0;
            foreach($links as $link) {
                if ($count < 3) {
                    $buttons .= '<a href="' . $link->getAttribute('href') . '" class="button button-primary">' . $link->nodeValue . '</a>';
                }
                $count++;
            }

            print '<ul class="quick-links">' . $buttons . '</ul>';
        }

        return false;
    }

?>

<div class="search-modal">
    <button id="search-modal-close" class="search-modal--button" data-action="close">
        <?php get_template_part('svg/search-close'); ?>
        <p class="close font-light">Close</p>
    </button>
    <div class="search-wrap">
        <?php 
            get_search_form(); 
            quickLinks();
        ?>
    </div>
</div>