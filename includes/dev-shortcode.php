<?php

/**
 * The callback of add_shortcode.
 * @SEE https://developer.wordpress.org/reference/functions/add_shortcode/
 * 
 * @EG
 * 
 * add_shortcode( 'footag', 'wpdocs_footag_func' );
 * 
 * function wpdocs_footag_func( $atts ) {
 * 
 *  return "foo = {$atts['foo']}";
 * 
 * }
 * 
 * How to
 * Typpe [dev_shortcode_01] with Elementor widget
 * 
 */
function dev_shortcode()
{
    $content = "This is a very basic shortcode";

    $content .= '<div style="color:red;">This is a div</div>';
    $content .= '<p style="color:green;">This is a block of paragraph.</p>';
    return $content;
}
add_shortcode('dev_shortcode_01', 'dev_shortcode');
