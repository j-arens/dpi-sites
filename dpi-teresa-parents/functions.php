<?php




/**** WIDGET AREAS ****/




//create new widget area
function dpi_create_widget_area( $name, $id, $description, $className) {

  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __($description),
    'before_widget' => '<div class="' . $className . '">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="' . $className . '-title">',
    'after_title' => '</h3>'
  ));
}

dpi_create_widget_area('Footer', 'footer_widget', 'Footer widget area.', 'footer-widget');
dpi_create_widget_area('Learning Section', 'learning_widget', 'Learning widget area', 'learning-widget');
dpi_create_widget_area('Important Links', 'important_links_widget', 'Important links widget area', 'impt-links-widget');

/*
* usage: <?php dynamic_sidebar( 'sidebar-id' ); ?>
*/



/**** DPI TESTIMONIALS ****/



/*
//testimonials posts area
function dpi_testimonials_posts_area() {
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonial', 'post type singular name'),
        'add_new' => _x('Add New', 'Testimonial'),
        'add_new_item' => __('Add New Testimonial'),
        'edit-item' => __('Edit Testimonial'),
        'new_item' => __('New Testimonial'),
        'all_items' => __('All Testimonials'),
        'view_item' => __('View Testimonial'),
        'search_items' => __('Search Testimonials'),
        'not_found' => __('No Testimonials Found'),
        'not_found_in_trash' => __('No testimonials found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Front page testimonials',
        'public' => true,
        'menu-position' => 1,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true
    );
    register_post_type('Testimonials', $args);
}
add_action('init', 'dpi_testimonials_posts_area');

//dpi testimonials shortcode output
function dpi_testimonials_posts() {
    //the query
    $the_query = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 3 ) );

    //the loop
    if ( $the_query->have_posts() ) {
	$string .= '<div class="faces-container">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$link = get_the_permalink();

		$string .= '<div class="inner-container">';

			$string .= '<a href="' . get_the_permalink() . '" class="face">';
            $string .= '<span class="img-container">';
            $string .= '<img src="' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ) .'">';
            $string .= '</span>';
            $string .= '<span class="name">' . get_the_title() . '</span>';
            $string .= '<a class="view-more" href="' . $link . '">Read more...</a>';
						$string .= '</a>';

						$string .= '</div>';
			}
	} else {
	// no posts found
}
$string .= '</div>';

return $string;

/* Restore original Post Data */
/*wp_reset_postdata();
}

// Add a shortcode
add_shortcode('testimonials_posts', 'dpi_testimonials_posts');

// remove permalink/view posts in the admin ui
function dpi_testimonials_hide_permalinks($return, $post_id, $new_title, $new_slug, $post)
{
    if($post->post_type == 'testimonials') {
        return '';
    }
    return $return;
}
add_filter('get_sample_permalink_html', 'dpi_testimonials_hide_permalinks', 10, 5);

// remove revslider meta box
function dpi_testimonials_remove_revslider_meta() {
    
    remove_meta_box( 'mymetabox_revslider_0', 'testimonials', 'normal' );
    
}
add_action( 'do_meta_boxes', 'dpi_testimonials_remove_revslider_meta' );

// remove meta boxes
function dpi_testimonials_remove_meta() {

    remove_meta_box( 'postexcerpt', 'testimonials', 'normal' );

}
add_action( 'admin_menu', 'dpi_testimonials_remove_meta' );
*/



/**** DPI LINK BOXES ****/




//home link boxes posts area
function dpi_links_boxes_posts_area() {
    $labels = array(
        'name' => _x('Link Boxes', 'post type general name'),
        'singular_name' => _x('Link Box', 'post type singular name'),
        'add_new' => _x('Add New', 'Link Box'),
        'add_new_item' => __('Add New Link Box'),
        'edit-item' => __('Edit Link Box'),
        'new_item' => __('New Link Box'),
        'all_items' => __('All Link Boxes'),
        'view_item' => __('View Link Box'),
        'search_items' => __('Search Link Boxes'),
        'not_found' => __('No Link Boxes Found'),
        'not_found_in_trash' => __('No Link Boxes found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Link Boxes'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Front page link boxes',
        'public' => true,
        'publicly_queriable' => false,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'menu-position' => 2,
        'supports' => array('title', 'thumbnail', 'page-attributes'),
    );
    register_post_type('link-boxes', $args);
}
add_action('init', 'dpi_links_boxes_posts_area');

// dpi links meta boxes
function link_box_details_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function link_box_details_add_meta_box() {
	add_meta_box(
		'link_box_details-link-box-details',
		__( 'Link Box Details', 'link_box_details' ),
		'link_box_details_html',
		'post',
		'normal',
		'high'
	);
	add_meta_box(
		'link_box_details-link-box-details',
		__( 'Link Box Details', 'link_box_details' ),
		'link_box_details_html',
		'link-boxes',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'link_box_details_add_meta_box' );

function link_box_details_html( $post) {
	wp_nonce_field( '_link_box_details_nonce', 'link_box_details_nonce' ); ?>

	<p>
		<label for="link_box_details_title"><?php _e( 'Title', 'link_box_details' ); ?></label><br>
		<input type="text" name="link_box_details_title" id="link_box_details_title" value="<?php echo link_box_details_get_meta( 'link_box_details_title' ); ?>">
	</p>	<p>
		<label for="link_box_details_click_url"><?php _e( 'Click URL', 'link_box_details' ); ?></label><br>
		<input type="text" name="link_box_details_click_url" id="link_box_details_click_url" value="<?php echo link_box_details_get_meta( 'link_box_details_click_url' ); ?>">
	</p><?php
}

function link_box_details_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['link_box_details_nonce'] ) || ! wp_verify_nonce( $_POST['link_box_details_nonce'], '_link_box_details_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['link_box_details_title'] ) )
		update_post_meta( $post_id, 'link_box_details_title', esc_attr( $_POST['link_box_details_title'] ) );
	if ( isset( $_POST['link_box_details_click_url'] ) )
		update_post_meta( $post_id, 'link_box_details_click_url', esc_attr( $_POST['link_box_details_click_url'] ) );
}
add_action( 'save_post', 'link_box_details_save' );

/*
	Usage: link_box_details_get_meta( 'link_box_details_title' )
	Usage: link_box_details_get_meta( 'link_box_details_click_url' )
*/


// dpi link boxes shortcode output
function dpi_homepage_link_boxes() {
    //the query
    $the_query = new WP_Query( array( 'post_type' => 'link-boxes', 'posts_per_page' => 6, 'order' => 'ASC' ) );

    //the loop
    if ( $the_query->have_posts() ) {
	$string .= '<div class="links-wrap">';
        
        while ( $the_query->have_posts() ) {
		$the_query->the_post();
            
            $link_size = link_box_details_get_meta( 'link_box_details_link_box_size' );
            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
        
        $string .= '<a class="link-' . link_box_details_get_meta( 'link_box_details_link_box_size' ) . '" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="' . $imageURL . '"></a>';
        

			}
	} else {
	// no posts found
}
$string .= '</div>';

return $string;

/* Restore original Post Data */
wp_reset_postdata();
}

// Add a shortcode
add_shortcode('link_boxes', 'dpi_homepage_link_boxes');

// remove permalink/view posts in the admin ui
function dpi_link_boxes_hide_permalinks($return, $post_id, $new_title, $new_slug, $post)
{
    if($post->post_type == 'link-boxes') {
        return '';
    }
    return $return;
}
add_filter('get_sample_permalink_html', 'dpi_link_boxes_hide_permalinks', 10, 5);

// remove meta boxes
function dpi_link_boxes_remove_meta() {

    remove_meta_box( 'pageparentdiv', 'link-boxes', 'side' );

}
add_action( 'admin_menu', 'dpi_link_boxes_remove_meta' );

// remove revslider meta box
function dpi_link_boxes_remove_revslider_meta() {
    
    remove_meta_box( 'mymetabox_revslider_0', 'link-boxes', 'normal' );
    
}
add_action( 'do_meta_boxes', 'dpi_link_boxes_remove_revslider_meta' );

//remove post published/updated/view post message in admin ui
function dpi_link_boxes_remove_post_published($messages) {
    unset($messages[post][6], $messages[post][1]);
    return $messages;
}
add_filter( 'post_updated_messages', 'dpi_link_boxes_remove_post_published');




/**** DPI STAFF PAGE WIDGET ****/




if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Staff Page',
		'id' => 'staff_page',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}

// we can only use this Widget if the plugin is active
if( class_exists( 'WidgetImageField' ) )
    add_action( 'widgets_init', create_function( '', "register_widget( 'ITI_Widget_Image_OTM' );" ) );
class ITI_Widget_Image_OTM extends WP_Widget
{
    var $image_field = 'image';  // the image field ID
    function __construct()
    {
        $widget_ops = array(
                'classname'     => 'staff_member',
                'description'   => __( "Staff Member")
            );
        parent::__construct( 'staff_member', __('Staff Member'), $widget_ops );
    }
    function form( $instance )
    {
        $headline   = esc_attr( isset( $instance['headline'] ) ? $instance['headline'] : '' );
        $image_id   = esc_attr( isset( $instance[$this->image_field] ) ? $instance[$this->image_field] : 0 );
        $position   = esc_attr( isset( $instance['position'] ) ? $instance['position'] : '' );
        $quote      = esc_attr( isset( $instance['quote'] ) ? $instance['quote'] : '' );
        $phone      = esc_attr( isset( $instance['phone'] ) ? $instance['phone'] : '' );
        $email      = esc_attr( isset( $instance['email'] ) ? $instance['email'] : '' );
        $image      = new WidgetImageField( $this, $image_id );
        ?>

            <div>
                <label><?php _e( 'Image:' ); ?></label>
                <?php echo $image->get_widget_field(); ?>
            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'headline' ); ?>"><?php _e( 'Name:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'headline' ); ?>" name="<?php echo $this->get_field_name( 'headline' ); ?>" type="text" value="<?php echo $headline; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo $position; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'quote' ); ?>"><?php _e( 'Quote:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" type="text" value="<?php echo $quote; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" />
                </label>
            </p>
        <?php
    }
    function widget( $args, $instance )
    {
        extract($args);
        $headline   = $instance['headline'];
        $image_id   = $instance[$this->image_field];
        $position   = $instance['position'];
        $quote      = $instance['quote'];
        $phone      = $instance['phone'];
        $email      = $instance['email'];
        $image      = new WidgetImageField( $this, $image_id );
        echo $before_widget;
        ?>
            <div class="staff_member">
                <?php if( !empty( $image_id ) ) : ?>
                    <img src="<?php echo $image->get_image_src( '' ); ?>" />
                <?php endif; ?>
                <?php if( !empty( $headline ) ) : ?>
                    <h5 class="staff_name"><?php echo $headline; ?></h5>
                <?php endif; ?>
                <?php if( !empty( $position ) ) : ?>
                    <p class="staff_position"><?php echo $position; ?></p>
                <?php endif; ?>
                <?php if( !empty( $quote ) ) : ?>
                    <p class="staff_quote"><?php echo $quote; ?></p>
                <?php endif; ?>
                <div class="staff_contacts">
                    <?php if( !empty( $email ) ) : ?>
                        <p class="staff_email"><a href="mailto:<?php echo $email; ?>"><img src="/wp/wp-content/themes/dpi-teresa-parents/images/icons/close-envelope-black.png" /><?php echo $email; ?></a></p>
                    <?php endif; ?>
                    <?php if( !empty( $phone ) ) : ?>
                        <p class="staff_phone"><a href="tel:+<?php echo $phone; ?>"><img src="/wp/wp-content/themes/dpi-teresa-parents/images/icons/telephone-black.png" /><?php echo $phone; ?></a></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        echo $after_widget;
    }
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['headline']            = strip_tags( $new_instance['headline'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
        $instance['position']               = strip_tags( $new_instance['position'] );
        $instance['quote']               = strip_tags( $new_instance['quote'] );
        $instance['phone']               = strip_tags( $new_instance['phone'] );
        $instance['email']               = strip_tags( $new_instance['email'] );
        return $instance;
    }
}




/**** OTHER MODIFICATIONS ****/




//custom excerpt length
function custom_excerpt_length( $length ) {
	global $post;
	if ( $post->post_type == 'testimonials' ) {
		return 0;
	} else {
		return 20;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Modify read more link on excerpts
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//font awesome
function enqueue_font_awesome(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_font_awesome');

//DPI Column Shortcode
function dpi_column_shortcode($atts, $content, $tag){
    
    // Attributes
	extract( shortcode_atts(
		array(
			'width' => '',
		), $atts )
	);
    
	$output = '<div class="dpi-column-' . $width . '">' . 
        do_shortcode($content) . 
        '</div>';
    
	return $output;
    
}
add_shortcode('column','dpi_column_shortcode');




/**** SITE SETUP ****/




/**
 * dpi-teresa functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dpi-teresa
 */

if ( ! function_exists( 'dpi_teresa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dpi_teresa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dpi-teresa, use a find and replace
	 * to change 'dpi-teresa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dpi-teresa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'dpi-teresa' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dpi_teresa_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dpi_teresa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dpi_teresa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dpi_teresa_content_width', 640 );
}
add_action( 'after_setup_theme', 'dpi_teresa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dpi_teresa_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dpi-teresa' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dpi-teresa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dpi_teresa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dpi_teresa_scripts() {
	wp_enqueue_style( 'dpi-teresa-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dpi-teresa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dpi-teresa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dpi_teresa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';