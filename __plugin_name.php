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
