<?php

    $quotes = carbon_get_the_post_meta('quote_slider_quotes', true);

?>

<section id="js-quote-slider" class="quote-slider">
    <?php if (empty($quotes)): ?>
        <p class="quote-slider__empty">It looks like there aren't any quotes here.</p>
    <?php else: ?>
        <ul class="quote-slider__list">
            <?php foreach($quotes as $i => $quote): ?>
                <li class="quote-slider__list-item <?= $i === 0 ? 'active' : '' ?>">
                    <blockquote class="quote-slider__quote">
                        <p class="quote-slider__quote-content"><?= $quote['content'] ?></p>
                        <cite class="quote-slider__quote-author">- <?= $quote['citation'] ?> -</cite>
                    </blockquote>
                </li>
            <?php endforeach; ?>
        </ul>
        <nav class="quote-slider__nav">
            <?php foreach($quotes as $i => $quote): ?>
                <button class="quote-slider__nav-button <?= $i === 0 ? 'active' : '' ?>" data-idx="<?= $i ?>"></button>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>
</section>