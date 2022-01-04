<?php
// Add custom css code
if(!function_exists('demeter_custom_frontend_style')){
  function demeter_custom_frontend_style(){
    global $theme_option;
?>
<style type="text/css">
  a {
    color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  ::selection {
    color: #fff;
    background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  ::-moz-selection {
    color: #fff;
    background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }

  /**** Custom logo ****/
  .logo{        
    width: <?php echo esc_attr($theme_option['logo_width']); ?>;
    height: <?php echo esc_attr($theme_option['logo_height']); ?>;  
    background:url('<?php echo esc_url($theme_option['logo']['url']); ?>') no-repeat center center;      
    background-size: <?php echo esc_attr($theme_option['logo_width']); ?> <?php echo esc_attr($theme_option['logo_height']); ?>;      
  }
  .cbp-af-header.cbp-af-header-shrink .logo {
    width: <?php echo esc_attr($theme_option['logo_width2']); ?>;
    height: <?php echo esc_attr($theme_option['logo_height2']); ?>;   
    background:url('<?php echo esc_url($theme_option['logo2']['url']); ?>') no-repeat center center;     
    background-size: <?php echo esc_attr($theme_option['logo_width2']); ?> <?php echo esc_attr($theme_option['logo_height2']); ?>;    
  }
  @media only screen and (max-width: 1200px) {
    .logo{
      width:109px;
      height:15px;   
      background:url('<?php echo esc_url($theme_option['logo']['url']); ?>') no-repeat center center; 
      background-size:109px 15px;
    }
    .cbp-af-header.cbp-af-header-shrink .logo{
      width:109px;
      height:15px;
      background:url('<?php echo esc_url($theme_option['logo2']['url']); ?>') no-repeat center center;  
      background-size:109px 15px;
    }
  }
  /**** Custom CSS Preload ****/
  #royal_preloader.logo .percentage { color: <?php echo esc_attr($theme_option['textpreload']); ?>; }  

  /**** Custom Color ****/
  .cd-headline.loading-bar .cd-words-wrapper::after,
  .pro-bar,
  .counter-line,
  .portfolio-box-1 .line-mask,
  .owl-theme .owl-controls .owl-page.active span,
  .owl-theme .owl-controls.clickable .owl-page:hover span,
  .pricing-item a.price-link:hover,
  .scroll-down-middle:hover,
  #video-volume:hover,
  .mb_YTVTime, #wp-calendar tbody td#today {
    background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  ul.slimmenu li a.mPS2id-highlight,
  .scroll-down:hover,
  #sync2 .item:hover p,
  .team-wrap .mask-team p span,
  .team-wrap .mask-team ul li p span,
  .list-social li.icon-soc a:hover,
  #filter li .current,
  #filter li a:hover,
  #sync2 .synced .item p,
  .ajax-project-info .ajax-info span,
  .ajax-link,
  .section-call-action-link p,
  .blog-item .blog-item-top-text,
  .blog-item:hover .read-more,
  .pricing-item:hover h6,
  .pricing-item.popular h6,
  .pricing-item .number-price span,
  #cd-google-map address,
  .footer-social a:hover,
  .footer-social a::before,
  .footer-social a::after, 
  .footer-credit a:hover,
  .footer-credit a::before,
  .footer-credit a::after,
  .blog-box-4:hover .link,
  .blog-box-4 .post-date,
  .slider-text-color, 
  .ajax-project-info ul li i,
  .icon-services .glyph-icon:before, 
  .services-item h6 a:hover,
  .contact-det h6 i, .contact-det p a:hover,
  .mb_YTVPBar, .slider-text-color, .team-wrap .mask-team > ul li:before,
  .widget_meta a:hover, .widget_recent_comments a:hover, .widget_rss ul li a:hover,
  #wp-calendar tfoot #next a:hover,#wp-calendar tfoot #prev a:hover {
    color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  .prev:hover,
  .next:hover,
  .prev:active, 
  .next:active,     
  .play:hover,
  .pause:hover,
  .play:active, 
  .pause:active {
    background-color:<?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  ul.slimmenu li a:hover {
      border-bottom:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  .sub-line {
    border-bottom:2px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  .section-separator-line{
    border-bottom:1px dashed <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  .owl-theme .owl-controls .owl-page span{
    border:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>; 
  }
  .services-item .fill-color{
    fill:<?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  #cd-zoom-in, #cd-zoom-out {
    background-color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  #ajax-form textarea:focus,
  #ajax-form input:focus,
  #ajax-form textarea:active,
  #ajax-form input:active { 
    border-bottom:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  #ajax-form button{
    color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }
  .tagcloud li a:hover {border:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;}
  .widget_meta abbr {
      border-bottom: 1px dotted <?php echo esc_attr( $theme_option['main-color'] ); ?>;
      cursor: help;
  }
  .blog-big-wrapper a:hover h5{color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;}
  .footer-credit a span{
    border-bottom:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
  }

  /**** Custom CSS footer ****/
  .footer-wrap {background: <?php echo esc_attr( $theme_option['background_footer'] ); ?>;}
  .footer-credit p, .footer-credit {color: <?php echo esc_attr( $theme_option['color_footer'] ); ?>;}
  <?php echo $theme_option['custom-css']; ?>
</style>
<?php
  }
}
add_action('wp_head', 'demeter_custom_frontend_style');


