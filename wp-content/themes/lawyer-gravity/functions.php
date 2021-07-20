<?php
/**
 * Theme functions and definitions
 *
 * @package lawyer_gravity
 */

if ( ! function_exists( 'lawyer_gravity_enqueue_styles' ) ) :
	/**
	 * @since Lawyer Gravity 1.0.0
	 */
	function lawyer_gravity_enqueue_styles() {
		wp_enqueue_style( 'lawyer-gravity-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'lawyer-gravity-style', get_stylesheet_directory_uri() . '/style.css', array( 'lawyer-gravity-style-parent' ), '1.0.0' );
		wp_enqueue_style( 'lawyer-gravity-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Playfair+Display:400,400i,700,900', false );
	}
endif;
add_action( 'wp_enqueue_scripts', 'lawyer_gravity_enqueue_styles', 99 );

function lawyer_gravity_customizer_fields( $fileds ) {
	unset( $fileds['footer_layout'] );
	return $fileds;
}

add_filter( 'Businessgravity_Customizer_fields', 'lawyer_gravity_customizer_fields', 11 );

/**
* Replace a class in body
*
* @since Lawyer Gravity 1.0.0
* @param array $class
* @return array $class
*/

function lawyer_gravity_remove_a_body_class($classes) {
	foreach($classes as $key => $value) {
	  	if( ( is_front_page() && ! is_home() ) || is_search() ){
	      if ($value == 'grid-col-2') unset($classes[$key]);
	      }
	  	}
	return $classes;
}

add_filter('body_class', 'lawyer_gravity_remove_a_body_class', 22, 2);

function lawyer_gravity_body_class_modification( $class ){
	if( ( is_front_page() && ! is_home() ) || is_search() ){
		$class[] = 'grid-col-3';
	}
	return $class;
}
add_filter( 'body_class', 'lawyer_gravity_body_class_modification', 22 );
