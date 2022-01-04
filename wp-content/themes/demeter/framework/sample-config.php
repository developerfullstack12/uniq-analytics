<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'theme_option',
        'use_cdn' => TRUE,
        'display_name'     => $theme->get('Name'),
        'display_version'  => $theme->get('Version'),
        'page_title' => 'Demeter Options',
        'update_notice' => FALSE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Demeter Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'dev_mode'   => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'demeter' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'demeter' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'demeter' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'demeter' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'demeter' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    // ACTUAL DECLARATION OF SECTIONS   
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-stackoverflow',
        'title' => __('Miscellaneous Settings', 'demeter'),
        'fields' => array(                    
            array(
                'id' => 'gmap_apikey',
                'type' => 'text',
                'title' => __('Google Map API Key', 'demeter'),
                'subtitle' => __('Add your google map api key, <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get API Key</a>', 'demeter'),
                'default' => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI'
            ),                                               
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-repeat',
        'title' => __('Preload Settings', 'demeter'),
        'fields' => array(
            array(
                'id' => 'show_pre',
                'type' => 'select',
                'title' => __('Show Preload?', 'demeter'),
                'subtitle' => __('Option Show Preload', 'demeter'),
                'desc' => __('', 'demeter'),
                'options'  => array(
                    'yes' => 'Yes',
                    'no'  => 'No',
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'logo_preload',
                'type' => 'media',
                'url' => true,
                'title' => __('Logo Preload', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your logo preload, Recommended size: 200px x 28px', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),  
            array(
                'id' => 'textpreload',
                'type' => 'color',
                'title' => __('Text number Color', 'demeter'),
                'subtitle' => __('Pick the Text Preload color for the theme (default: #212121).', 'demeter'),
                'default' => '#212121',
                'validate' => 'color',
            ),  
            array(
                'id' => 'bgpreload',
                'type' => 'color',
                'title' => __('Background Color', 'demeter'),
                'subtitle' => __('Pick the Background Preload color for the theme (default: #FFFFFF).', 'demeter'),
                'default' => '#FFFFFF',
                'validate' => 'color',
            ),  
            
         )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-picture',
        'title' => __('Logo & Favicon Settings', 'demeter'),
        'fields' => array(
            array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => true,
                'title' => __('Custom Favicon', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your Favicon.', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
            ),
            array(
                'id'   =>'divider_1',
                'desc' => __('', 'demeter'),
                'type' => 'divide'
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'url' => true,
                'title' => __('Logo static', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your logo static.', 'demeter'),
                'subtitle' => __('Recommended size: Height: 20px and Width: 145px', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id' => 'logo_width',
                'type' => 'text',
                'title' => __('Fix Width Logo static, Default: 145px', 'demeter'),
                'subtitle' => __('Input Width logo', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => '145px'
            ),  
            array(
                'id' => 'logo_height',
                'type' => 'text',
                'title' => __('Fix Height Logo static, Default: 20px', 'demeter'),
                'subtitle' => __('Input Height Logo', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => '20px'
            ),  
            array(
                'id'   =>'divider_2',
                'desc' => __('', 'demeter'),
                'type' => 'divide'
            ),
            array(
                'id' => 'logo2',
                'type' => 'media',
                'url' => true,
                'title' => __('Logo scroll', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your logo scroll.', 'demeter'),
                'subtitle' => __('Recommended size: Height: 16px and Width: 116px', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id' => 'logo_width2',
                'type' => 'text',
                'title' => __('Fix Width Logo scroll, Default: 116px', 'demeter'),
                'subtitle' => __('Input Width logo scroll', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => '116px'
            ),  
            array(
                'id' => 'logo_height2',
                'type' => 'text',
                'title' => __('Fix Height Logo scroll, Default: 16px', 'demeter'),
                'subtitle' => __('Input Height Logo scroll', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => '16px'
            ),  
            array(
                'id'   =>'divider_3',
                'desc' => __('', 'demeter'),
                'type' => 'divide'
            ),
            array(
                'id' => 'apple_icon',
                'type' => 'media',
                'url' => true,
                'title' => __('Apple Touch Icon 57x57', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your Apple touch icon 57x57.', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon.png'),
            ),                  
            array(
                'id' => 'apple_icon_72',
                'type' => 'media',
                'url' => true,
                'title' => __('Apple Touch Icon 72x72', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your Apple touch icon 72x72.', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-72x72.png'),
            ),
            array(
                'id' => 'apple_icon_114',
                'type' => 'media',
                'url' => true,
                'title' => __('Apple Touch Icon 114x114', 'demeter'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your Apple touch icon 114x114.', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-114x114.png'),
            ),                  
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-blogger',
        'title' => __('Blog Settings', 'demeter'),
        'fields' => array(  
            array(
                'id' => 'blog_layout',
                'type' => 'select',
                'title' => __('Blog Layout', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'desc' => __('Select Blog Layout for all page default: index, demeterve, category, author, search, tag ,...', 'demeter'),
                'options'  => array(
                    'list' => 'Layout List',
                    'grid'  => 'Layout Grid',                                                        
                ),
                'default' => 'list',
            ),  
            array(
                'id' => 'single_layout',
                'type' => 'select',
                'title' => __('Single Blog Layout', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'desc' => __('Select Single Blog Layout for Single Blog Page.', 'demeter'),
                'options'  => array(
                    'withsidebar' => 'Single Width Sidebar',
                    'fullwidth'  => 'Single FullWidth & Use Visual Composer',                                                        
                ),
                'default' => 'withsidebar',
            ),              
            array(
                'id' => 'read_more',
                'type' => 'text',
                'title' => __('Button Text For Post', 'demeter'),
                'subtitle' => __('Input Button Text', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => 'Read more'
            ),                                                
         )
     ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-briefcase',
        'title' => __('Portfolio Settings', 'demeter'),
        'fields' => array(
            array(
                'id' => 'ajax_work',
                'type' => 'select',
                'title' => __('Portfolio Ajax Load ?', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'desc' => __('Use for Portfolio in home page, Load Ajax Content or Link out single Portfolio.', 'demeter'),
                'options'  => array(
                    'yes' => 'Yes',
                    'no'  => 'No',                                                        
                ),
                'default' => 'yes',
            ),                              
         )
     ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-graph',
        'title' => __('404 Settings', 'demeter'),
        'fields' => array(
             array(
                'id' => '404_title',
                'type' => 'text',
                'title' => __('404 Title', 'demeter'),
                'subtitle' => __('Input 404 Title', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => '404'
            ),                              
             array(
                'id' => '404_content',
                'type' => 'editor',
                'title' => __('404 Content', 'demeter'),
                'subtitle' => __('Enter 404 Content', 'demeter'),
                'desc' => __('', 'demeter'),
                'default' => 'The page you are looking for no longer exists. Perhaps you can return back to the sites homepage see you can find what you are looking for.'
            ),      
            array(
                'id' => 'back_404',
                'type' => 'text',
                'title' => __('Button Back Home', 'demeter'),                        
                'desc' => __('Text Button Go To Home.', 'demeter'),
                'subtitle' => __('', 'demeter'),
                'default' => 'Back To Home',
            ),                  
         )
     ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-group',
        'title' => __('Social Settings', 'demeter'),
        'fields' => array(
            array(
                'id' => 'facebook',
                'type' => 'text',
                'title' => __('Facebook Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://www.facebook.com/',
            ),
            array(
                'id' => 'google',
                'type' => 'text',
                'title' => __('Google+ Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://plus.google.com',
            ),
            array(
                'id' => 'twitter',
                'type' => 'text',
                'title' => __('Twitter Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://twitter.com/',
            ),
            array(
                'id' => 'github',
                'type' => 'text',
                'title' => __('Github Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '#'
            ),
            array(
                'id' => 'youtube',
                'type' => 'text',
                'title' => __('Youtube Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'linkedin',
                'type' => 'text',
                'title' => __('Linkedin Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'dribbble',
                'type' => 'text',
                'title' => __('Dribbble Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'behance',
                'type' => 'text',
                'title' => __('Behance Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'instagram',
                'type' => 'text',
                'title' => __('Instagram Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'skype',
                'type' => 'text',
                'title' => __('Skype Url', 'demeter'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'social_extend',
                'type' => 'editor',
                'title' => esc_html__('Add your social extend', 'demeter'),
                'subtitle' => esc_html__('Add your social html code here, if your social network not have in listed social network above.', 'demeter'),
                'description' => esc_html__('HTML code: <a target="_blank" href="#" data-dummy="facebook">facebook</a>', 'demeter'),
                'default' => '',
            ),   
        )
     ) );
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => __('Footer Settings', 'demeter'),
        'fields' => array(                      
            array(
                'id' => 'footer_text',
                'type' => 'editor',
                'title' => __('Footer Text', 'demeter'),
                'subtitle' => __('Copyright Text', 'demeter'),
                'default' => 'ALL RIGHT RESERVED. MADE BY OCEANTHEMES',
            ),                  
        )
     ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-website',
        'title' => __('Styling Options', 'demeter'),
        'fields' => array(
            array(
                'id' => 'theme_style',
                'type' => 'select',
                'title' => __('Theme Style', 'demeter'),
                'subtitle' => __('Select Theme Style : Dark Or Light', 'demeter'),
                'desc' => __('Use Style Dark Or Style Light for full website.', 'demeter'),
                'options'  => array(
                    'light' => 'Theme Style Light',
                    'dark' => 'Theme Style Dark',                            
                ),
                'default' => 'light',
            ),
            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => __('Theme Main Color', 'demeter'),
                'subtitle' => __('Pick the main color for the theme (default: #0096a7).', 'demeter'),
                'default' => '#0096a7',
                'validate' => 'color',
            ),  
            array(
                'id' => 'background_footer',
                'type' => 'color',
                'title' => __('Footer Background Color', 'demeter'),
                'subtitle' => __('Pick a background color for the footer (default: #ffffff).', 'demeter'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'color_footer',
                'type' => 'color',
                'title' => __('Footer  Color', 'demeter'),
                'subtitle' => __('Pick a  color for the footer (default: #212121).', 'demeter'),
                'default' => '#212121',
                'validate' => 'color',
            ),
            
            array(
                'id' => 'body-font2',
                'type' => 'typography',
                'output' => array('body'),
                'title' => __('Body Font', 'demeter'),
                'subtitle' => __('Specify the body font properties.', 'demeter'),
                'google' => true,
                'default' => array(
                    'color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-family' => '',
                    'font-weight' => ''
                ),
            ),
             array(
                'id' => 'custom-css',
                'type' => 'ace_editor',
                'title' => __('CSS Code', 'demeter'),
                'subtitle' => __('Paste your CSS code here.', 'demeter'),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                'default' => ""
            ),
        )
     ) );

    /*
     * <--- END SECTIONS
     */
