<?php
/**
 * Template Name: Religious Ed. Template
 */

 $rsEdGroups = get_field('groups');

 function dpiListRsEdGroupsNav($groups) {
    $counter = 0;
    $menu = '<nav id="dpi-reveal__nav" class="rs-ed__nav"><ul class="rs-ed__nav-menu">';

    foreach($groups as $group) {
        $menu .= '
            <li class="rs-ed__nav-item pulse-btn-dk ' . ($counter === 0 ? "active" : "") . '" data-idx="' . $counter . '">
                ' . $group['group_icon'] . '
                <p class="rs-ed__nav-title">' . $group['group_name'] . '</p>
            </li>
        ';
        $counter++;
    }

    return $menu .= '</ul></nav>';
 }

 function dpiListRsEdGroups($groups) {
    $counter = 0;
    $articles = '<ul id="dpi-reveal__list" class="rs-ed__articles">';

    foreach($groups as $group) {
        $articles .= '
            <li class="rs-ed__articles-item ' . ($counter === 0 ? "active" : "") . '">
                <h1 class="rs-ed__articles-title">' . $group['group_name'] . '</h1>
                <article>
                    ' . $group['group_content'] . '
                </article>
            </li>
        ';
        $counter++;
    }

    return $articles .= '</ul>';
 }

?>

<div id="dpi-reveal__root" class="rs-ed-container">
    <?php 

        if (empty($rsEdGroups)) {
            echo '<p>Check back here soon for more information!</p>';
        } else {
            echo dpiListRsEdGroups($rsEdGroups);
            echo dpiListRsEdGroupsNav($rsEdGroups);
        }
    
    ?>
</div>