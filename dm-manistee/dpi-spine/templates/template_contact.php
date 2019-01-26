<?php
/**
 * Template Name: Contact Page
 */
?>

<?php 

    $contact = [
        'phone' => get_post_meta($post->ID, 'Phone', true),
        'phone_fallback' => '231.723.2619',
        'email' => get_post_meta($post->ID, 'Email', true),
        'email_fallback' => 'email@email.com',
        'address' => get_post_meta($post->ID, 'Address', true),
        'address_fallback' => '254 Sixth Street, Manistee, MI 49660'
    ];

    $cluster = [
        'heading' => get_post_meta($post->ID, 'Cluster Heading', true),
        'heading_fallback' => 'All Masses are currently celebrated in the St. Joseph Church building. Guardian Angels and St. Mary Carmel Shrine are limited use facilites and are not open for tours.',
        'subheading' => get_post_meta($post->ID, 'Cluster Subheading', true),
        'subheading_fallback' => 'As of November 27, 2016, the parishes of Guaurdian Angels, St. Joseph, and St. Mark of Mt. Carmel Shrine officially become Divine Mercy Parish. Each of the church buildings retain their name.',
        'churches' => [
            [
                'name' => get_post_meta($post->ID, 'Church 1 Name', true),
                'name_fallback' => 'St. Joseph Church',
                'address' => get_post_meta($post->ID, 'Church 1 Address', true),
                'address_fallback' => '249 Sixth Street, Manistee, MI 49660',
                'map_link' => get_post_meta($post->ID, 'Church 1 Google Maps Link', true),
                'map_link_fallback' => 'https://www.google.com/maps/dir//249+6th+St,+Manistee,+MI+49660/@44.23988,-86.3183417,17z/data=!4m16!1m7!3m6!1s0x881c29161356527b:0x3331180cf9446989!2s249+6th+St,+Manistee,+MI+49660!3b1!8m2!3d44.23988!4d-86.316153!4m7!1m0!1m5!1m1!1s0x881c29161356527b:0x3331180cf9446989!2m2!1d-86.316153!2d44.23988'
            ],
            [
                'name' => get_post_meta($post->ID, 'Church 2 Name', true),
                'name_fallback' => 'Guardian Angels Church',
                'address' => get_post_meta($post->ID, 'Church 2 Address', true),
                'address_fallback' => '371 5th Street, Manistee, MI 49660',
                'map_link' => get_post_meta($post->ID, 'Church 2 Google Maps Link', true),
                'map_link_fallback' => 'https://www.google.com/maps/dir//371+5th+St,+Manistee,+MI+49660/@44.242002,-86.3244297,17z/data=!4m16!1m7!3m6!1s0x881c293eb5b46757:0xe1e203c4418f7a14!2s371+5th+St,+Manistee,+MI+49660!3b1!8m2!3d44.242002!4d-86.322241!4m7!1m0!1m5!1m1!1s0x881c293eb5b46757:0xe1e203c4418f7a14!2m2!1d-86.322241!2d44.242002'
            ],
            [
                'name' => get_post_meta($post->ID, 'Church 3 Name', true),
                'name_fallback' => 'St. Mary of Mount Carmel Shrine',
                'address' => get_post_meta($post->ID, 'Church 3 Address', true),
                'address_fallback' => '260 St. Mary\'s Parkway, Manistee, MI 49660',
                'map_link' => get_post_meta($post->ID, 'Church 3 Google Maps Link', true),
                'map_link_fallback' => 'https://www.google.com/maps/dir//260+St+Mary+S+Pkwy,+Manistee,+MI+49660/@44.2540536,-86.3293254,17z/data=!4m16!1m7!3m6!1s0x881c294569ca8831:0x136cb2b23b1b2b25!2s260+St+Mary+S+Pkwy,+Manistee,+MI+49660!3b1!8m2!3d44.2540536!4d-86.3271367!4m7!1m0!1m5!1m1!1s0x881c294569ca8831:0x136cb2b23b1b2b25!2m2!1d-86.3271367!2d44.2540536'
            ]
        ]
    ];

    get_template_part('partials/page-header');
?>
<article class="container">
    <div class="parish-contact-info row">
        <div class="parish-info col-xs-12 col-xl-5">
            <h1>Divine Mercy Parish Office</h1>
            <ul>
                <li><a href="tel:<?php echo empty($contact['phone']) ? $contact['phone_fallback'] : $contact['phone']; ?>"><?php echo empty($contact['phone']) ? $contact['phone_fallback'] : $contact['phone']; ?></a></li>
                <li><a href="mailto:<?php echo empty($contact['email']) ? $contact['email_fallback'] : $contact['email']; ?>"><?php echo empty($contact['email']) ? $contact['email_fallback'] : $contact['email']; ?></a></li>
                <li><?php echo empty($contact['address']) ? $contact['address_fallback'] : $contact['address']; ?></li>
            </ul>
        </div>
        <div class="parish-map col-xs-12 col-xl-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2858.3866282020554!2d-86.31782988448309!3d44.24028517910565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x881c291670549203%3A0x75ba664ecbd42938!2s254+6th+St%2C+Manistee%2C+MI+49660!5e0!3m2!1sen!2sus!4v1490553654108" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="parish-contact-form row">
        <div class="form-header col-xs-12 col-xl-4">
            <h1>Questions?</h1>
            <h1>Comments?</h1>
        </div>
        <div class="contact-form-container col-xs-12 col-xl-8">
            <?php echo do_shortcode('[contact-form-7 id="207" title="Contact form 1"]'); ?>
        </div>
    </div>
    <div class="parish-contact-cluster">
        <p class="cluster-heading maven-pro">
            <?php echo empty($cluster['heading']) ? $cluster['heading_fallback'] : $cluster['heading']; ?>
        </p>
        <p class="cluster-subheading maven-pro">
            <?php echo empty($cluster['subheading']) ? $cluster['subheading_fallback'] : $cluster['subheading']; ?>
        </p>
        <div class="row">
            <?php 
                foreach($cluster['churches'] as $church) {
                    echo '
                        <div class="member-info col-xs-12 col-xl-4">
                            <p class="member-name">' . (empty($church['name']) ? $church['name_fallback'] : $church['name']) . '</p>
                            <p class="member-address">' . (empty($church['address']) ? $church['address_fallback'] : $church['address']) . '</p>
                            <a href="' . (empty($church['map_link']) ? $church['map_link_fallback'] : $church['map_link']) . '" target="_blank" class="member-maps-link button">View in Google Maps</a>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</article>