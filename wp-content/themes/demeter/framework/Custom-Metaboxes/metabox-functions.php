<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
    $meta_boxes[] = array(
        'id'         => 'page_setting',
        'title'      => 'Page Setting',
        'pages'      => array('page'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Page SubTitle',
                'desc' => 'Set Page SubTitle, use for : Default Template and FullWidth',
                'id'   => $prefix . 'page_subtitle',
                'type'    => 'text',
            ),   
            array(
                'name' => 'Upload Background Image for Top Page',
                'desc' => 'Upload an image or enter an URL, Recommended Size: 1900 x 1012, Use for Template Page : Default Page and FullWidth',
                'id' => $prefix . 'page_background',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),         
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
        'id'         => 'post_setting',
        'title'      => 'Post Setting',
        'pages'      => array('post'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array( 
            array(
                'name' => __( 'Content Right', 'demeter' ),
                'desc' => __( 'Content Right Title', 'demeter' ),
                'id'   => $prefix . 'right_text',
                'type' => 'textarea'
            ),
            array(
                'name' => __( 'Excerpt Post', 'demeter' ),
                'desc' => __( 'Text show on blog page', 'demeter' ),
                'id'   => $prefix . 'ex_post',
                'type' => 'textarea'
            ),         
        )
    );

    $meta_boxes[] = array(
        'id'         => 'portfolio_setting',
        'title'      => 'Portfolio Setting',
        'pages'      => array('portfolio', 'slide'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Crop Thumbnail Portfolio',
                'desc' => 'Select Crop Thumbnail Image Size, Default: Crop image size: 600 x 400, Display on home page.',
                'id'   => $prefix . 'cropthumb',
                'type'    => 'select',
                'options' => array(
                        array( 'name' => 'Crop image size: 600 x 400', 'value' => 'small_small', ),
                        array( 'name' => 'Crop image size: 600 x 800', 'value' => 'small_medium', ),
                        array( 'name' => 'Crop image size: 1200 x 800', 'value' => 'medium_medium', ),                        
                    ),
                'std' => 'small_small'    
            ),  
            array(
                'name' => 'Portfolio SubTitle',
                'desc' => 'Set Portfolio SubTitle, Leave a blank do not show.',
                'id'   => $prefix . 'portfolio_subtitle',
                'type'    => 'text',
            ),     
            array(
                'name' => 'Upload Background Image for Top Single Portfolio Page',
                'desc' => 'Upload an image or enter an URL, Recommended Size: 1900 x 1012.',
                'id' => $prefix . 'image_thumbnail',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ), 
            array(
                'name' => __( 'Link Video, Use for Video Portfolio Layout (OT Portfolio)', 'demeter' ),
                'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/eP2VWNtU5rw or http://player.vimeo.com/video/112765699', 'demeter' ),
                'id'   => $prefix . 'folio_video',
                'type' => 'text'
            ),                
        )
    );
	
	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
