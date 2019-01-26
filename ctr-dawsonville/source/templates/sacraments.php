<?php
/**
 * Template Name: Sacraments Template
 */

 $sacramentGroups = get_field('sacrament_groups');

 function dpiListSacramentsNav($groups) {
    $counter = 0;
    $menu = '<nav id="dpi-reveal__nav" class="sacraments__nav"><ul class="sacraments__nav-menu">';

    foreach($groups as $group) {
        $menu .= '
            <li class="sacraments__nav-item pulse-btn-dk ' . ($counter === 0 ? "active" : "") . '" data-idx="' . $counter . '">
                ' . $group['sacrament_icon'] . '
                <p class="sacraments__nav-title">' . $group['sacrament_name'] . '</p>
            </li>
        ';
        $counter++;
    }

    return $menu .= '</ul></nav>';
 }

 function dpiListSacramentsGroups($groups) {
    $counter = 0;
    $articles = '<ul id="dpi-reveal__list" class="sacraments__articles">';

    foreach($groups as $group) {
        $articles .= '
            <li class="sacraments__articles-item ' . ($counter === 0 ? "active" : "") . '">
                <h1 class="sacraments__articles-title">' . $group['sacrament_name'] . '</h1>
                <article>
                    ' . $group['sacrament_content'] . '
                </article>
            </li>
        ';
        $counter++;
    }

    return $articles .= '</ul>';
 }

 ?>

 <div id="dpi-reveal__root" class="sacraments-container">
    <?php 

        if (empty($sacramentGroups)) {
            echo '<p>Check back here soon for more information!</p>';
        } else {
            echo dpiListSacramentsGroups($sacramentGroups);
            echo dpiListSacramentsNav($sacramentGroups);
        }
    
    ?>
 </div>