<?php

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
dpi_create_widget_area('Staff Page', 'staff_page', 'Place staff members here.', 'staff-widget');
dpi_create_widget_area('Category Menu', 'category_menu', 'Category widget area', 'category-widget');
dpi_create_widget_area('Pastor Notes', 'pastor_notes', 'Notes from the pastor.', 'pastor-notes-widget');

//add custom register_sidebar area to a page
//<?php dynamic_sidebar( 'sidebar-id' ); + closing php tag

// ---------------- Shortcode for Subpages list

function mysubpageslist()
	{
		// Exclude the heading using 'title_li='
		// Show only child pages using child_of='.$post->ID.
		// Use echo=0 to prevent output of shortcode to printed before text in page or post
		// Sort by page order using 'sort_column=menu_order'
		// Separate parameters with a &

		global $post;	// Must have this to support $post->ID

  		return '<div class="my-subpages"><h2>'.get_the_title().'</h2><ul class="mysubpageslist">'.wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_column=menu_order').'</ul></div>';
	}

add_shortcode('mysubpageslist', 'mysubpageslist');

// usage: [mysubpageslist]
////////////////////////////////////////////////////////

if( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('Homepage');
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Staff');

}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
   // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

// remove ie css from twentytwelve theme
function diocesan_ie_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie_dequeue_styles', 11 );

// remove ie css from twentytwelve theme
function diocesan_ie8_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie8' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie8_dequeue_styles', 11 );

// remove ie css from twentytwelve theme
function diocesan_ie7_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie7' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie7_dequeue_styles', 11 );

//add new from child theme
wp_enqueue_style( 'diocesan-ie', get_stylesheet_directory_uri() . '/ie.css', array( 'twentysixteen-style' ), '1.0' );
$wp_styles->add_data( 'diocesan-ie', 'conditional', 'lt IE 9' );


// Child/Subling Widget
wp_register_sidebar_widget(
	'dpi_child_sibling_menu',
	"Child Sibling Menu",
	"DPI_ChildSiblingMenu",
	array(
		"description"	=> "Display the child or sibling pages as a menu."
	)
);

function myparish_messages_execerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 120);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'... ';
return $excerpt;
}

// Child/Sibling Menu
function DPI_ChildSiblingMenu( $args )
{
	global $wp_query;

	// Start the output buffer
	$output = "";

	// Get all the pages
	$allPages = get_pages();

	// What page are we on
	$post_id = $wp_query->post->ID;
    $parent_id = $wp_query->post->post_parent;
    $parentPage = $wp_query->post->post_title;
    $parentPageURL = $wp_query->post->post_name;

	if( $post_id )
	{
		// Are there any child pages
		$children = array();
		foreach( $allPages as $page )
		{
			if( $page->post_parent == $wp_query->post->ID )
			{
				$children[] = $page;
			}
		}

		// Did we find children
		if( $children )
		{
			foreach( $children as $child )
			{
				$output .= "<li><a href='" . site_url( $child->post_name ) . "'>{$child->post_title}</a></li>";
			}
		}
		else
		{
			// Are there any sibling pages
			$siblings = array();
			foreach( $allPages as $page )
			{
				if( $wp_query->post->post_parent > 0 && $page->post_parent == $wp_query->post->post_parent )
				{
					$siblings[] = $page;
				}
			}

			// Did we find any siblings
			if( $siblings )
			{
				foreach( $siblings as $sibling )
				{
					$output .= "<li><a href='" . site_url( $sibling->post_name ) . "'>{$sibling->post_title}</a></li>";
				}

                // What is the parent
                foreach( $allPages as $page )
                {
                    if( $page->ID == $parent_id )
                    {
                        $parentPage = $page->post_title;
                        break;
                    }
                }
			}
		}


		// Is there any output to return
		if( $output )
		{
			// Wrap inside a list container
			$output = "<div class='expanding_menu_button'><img src='/wp-content/uploads/2016/02/icon_ellipses.png' alt='' /></div><ul id='childSiblingContainer'>{$output}</ul>";
		}
	}

	echo $output;
}

// ==================  Staff page widget   =====================

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
        $position      = esc_attr( isset( $instance['position'] ) ? $instance['position'] : '' );
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
        $position      = $instance['position'];
        $phone      = $instance['phone'];
        $email      = $instance['email'];
        $image      = new WidgetImageField( $this, $image_id );
        echo $before_widget;
        ?>
            <div class="staff_member">
                <?php if( !empty( $image_id ) ) : ?>
                    <img class="staff_photo" src="<?php echo $image->get_image_src( '' ); ?>" />
                <?php endif; ?>
                <?php if( !empty( $headline ) ) : ?>
                    <h5 class="staff_name"><?php echo $headline; ?></h5>
                <?php endif; ?>
                <?php if( !empty( $position ) ) : ?>
                    <p class="staff_position"><?php echo $position; ?></p>
                <?php endif; ?>
                <div class="staff_contacts">
                    <?php if( !empty( $email ) ) : ?>
                        <p class="staff_email"><a href="mailto:<?php echo $email; ?>"><img src="/wp-content/uploads/2016/02/email131.png" /></a></p>
                    <?php endif; ?>
                    <?php if( !empty( $phone ) ) : ?>
                        <p class="staff_phone"><a href="tel:+<?php echo $phone; ?>"><img src="/wp-content/uploads/2016/01/icon_phone-1.png" /></a></p>
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
        $instance['phone']               = strip_tags( $new_instance['phone'] );
        $instance['email']               = strip_tags( $new_instance['email'] );
        return $instance;
    }
}
