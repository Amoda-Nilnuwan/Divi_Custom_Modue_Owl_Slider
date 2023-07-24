<?php
/*
Plugin Name: Owl Slider
Plugin URI:  Surge.global
Description: Divi Module for add Owl Carousel Slider with some custom options
Version:     1.0.0
Author:      Amoda Deshanjana
Author URI:  Amoda@surge.global
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: owl-owl_slider
Domain Path: /languages

Owl Slider is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Owl Slider is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Owl Slider. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'owl_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function owl_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/OwlSlider.php';
}
add_action( 'divi_extensions_init', 'owl_initialize_extension' );
endif;

function add_extra_css_js(){
	wp_enqueue_script('Owl_carousel_js',plugin_dir_url( __FILE__ ).'/scripts/owl.carousel.min.js',array('jquery'), '1.0', true);
	wp_enqueue_style('Owl_carousel_css',plugin_dir_url( __FILE__ ).'/styles/owl.carousel.min.css',false,'1.1','all');
	wp_enqueue_style('Owl_carousel_theme_css',plugin_dir_url( __FILE__ ).'/styles/owl.theme.default.min.css',false,'1.1','all');
}

add_action( 'wp_enqueue_scripts', 'add_extra_css_js');

function load_sample_child_module($content, $function_name, $module) {
    // Check if the current module is your main custom module
    if ($module->slug === 'owl_carousel') {
        // Add the shortcode of the child module you want to load
        $sample_child_shortcode = '[owl_carousel_child label="test" single_content="111" slider_image="http://amoda-nilnuwan.local/wp-content/uploads/2023/07/Screenshot-2022-09-14-232152.png" slider_image_fit="scale-down" _builder_version="4.21.0" _module_preset="default" global_colors_info="{}"][/owl_carousel_child]';
        $content .= do_shortcode($sample_child_shortcode);
    }

    return $content;
}

add_filter('et_builder_module_shortcode', 'load_sample_child_module', 10, 3);
