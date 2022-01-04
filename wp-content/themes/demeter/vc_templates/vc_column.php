<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $title
 * @var $wap_class
 * @var $wap_id
 * @var $column_effect
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $width = $css = $offset = $title = $wap_class = $wap_id = $column_effect = $css_animation = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$effect_col = '';
if($column_effect == 'bottommove'){
	$effect_col = 'data-scroll-reveal="enter bottom move 100px over 0.6s after 0.2s"';
}elseif($column_effect == 'topmove'){
	$effect_col = 'data-scroll-reveal="enter top move 100px over 0.6s after 0.2s"';
}else{
	$effect_col = '';
}
$wap_id = (!empty($wap_id) ? ' id="'.esc_attr($wap_id).'"' : '');

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	$css_classes[]='vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' '.$effect_col.' >';
$output .= '<div class="' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= '<div '.$wap_id.' class="wpb_wrapper '.$wap_class.'">';
if($title!=""){ $output .='<h5>'.$title.'</h5>'; }
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
