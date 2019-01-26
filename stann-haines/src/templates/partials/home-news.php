<div class="home-main-container home-news">
    <header class="home-news-header">
        <p class="home-news-header--title font-light">
            News and Events
        </p>
        <!--<div class="home-news-controls">
            <button class="home-news-controls--button" data-action="prev">
                #<?php get_template_part('svg/arrow-left'); ?>
            </button>
            <span class="home-news-controls--meta">
                March 2017
            </span>
            <button class="home-news-controls--button" data-action="next">
                #<?php get_template_part('svg/arrow-right'); ?>
            </button>
        </div>-->
    </header>
    <div class="home-news-content container">
        <div class="row">
            <?php echo do_shortcode('[dpi_news]'); ?>
        </div>
    </div>
</div>