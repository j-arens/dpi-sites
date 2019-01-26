<?php 

    $quotes = array_replace_recursive(
        [
            [
                'quote' => 'Love alone is the answer to that yearning for infinite happiness.',
                'citation' => 'Pope Francis'
            ],
            [
                'quote' => 'The birth of this baby brings hope and joy to all creation and not just to a single family. in fact, the birth of this baby means that we all become members of one family—god’s family—united across cultures, political opinions, economic conditions, races, genders and nations.',
                'citation' => 'Archbishop Wilton D. Gregory'
            ],
            [
                'quote' => 'God cannot give us happiness and peace apart from himself, because it is not there. there is no such thing.',
                'citation' => 'C. S. Lewis'
            ]
        ],
        get_field('quotes')
    );

    function dpiListQuotes($quotes) {
        $counter = 0;
        $quotesList = '<ul class="quote-slider__list">';

        foreach($quotes as $quote) {
            $quotesList .= '
                <li class="quote-slider__list-item ' . ($counter === 0 ? "active" : "") . '">
                    <blockquote class="quote-slider__quote">
                        <p class="quote-slider__quote-content">&ldquo; ' . $quote['quote'] . ' &rdquo;</p>
                        <cite class="quote-slider__quote-author">- ' . $quote['citation'] . ' -</cite>
                    </blockquote>
                </li>
            ';

            $counter++;
        }

        return $quotesList . '</ul>';
    }

    function dpiListQuotesNav($quotes) {
        $counter = 0;
        $nav = '<nav class="quote-slider__nav">';

        foreach($quotes as $quote) {
            $nav .= '
                <button class="quote-slider__nav-button ' . ($counter === 0 ? "active" : "") . '" data-idx="' . $counter . '"></button>
            ';

            $counter++;
        }

        return $nav . '</nav>';
    }

?>

<section id="quote-slider__root" class="quote-slider">
    <?=dpiListQuotes($quotes)?>
    <?=dpiListQuotesNav($quotes)?>
</section>