<?php
/**
 * Functions.php acts like a plugin and will initialize any php files included.
 *
 * @package WordPress
 */

add_action( 'after_setup_theme', 'vangeek_theme_setup' );
/**
 * [vangeek_theme_setup]
 *
 * @return void
 */
function vangeek_theme_setup() {
	if ( ! get_theme_mod( 'background_color', false ) ) {
		set_theme_mod( 'background_color', 'ffffff' );
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_vangeek_style', 11 );
/**
 * [enqueue_vangeek_style] As a child theme, let's make sure we enqueue scripts and styles from the parent theme.
 *
 * @return void
 */
function enqueue_vangeek_style() {
	 wp_register_style( 'parent-style', esc_url( trailingslashit( get_template_directory_uri() ) . 'style.css' ), [], 1.3 );
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'parent-style' ),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);
}

add_action( 'enqueue_block_assets', 'enqueue_vangeek_block_styles' );
/**
 * [enqueue_vangeek_block_styles] Block styles for frontend and backend.
 *
 * @return void
 */
function enqueue_vangeek_block_styles() {
	wp_enqueue_style(
		'vangeek-block-styles',
		get_stylesheet_directory_uri() . '/css/block-styles.css',
		array(),
		filemtime( get_stylesheet_directory() . '/css/block-styles.css' ),
	);
}


// add_action( 'enqueue_block_editor_assets', 'enqueue_vangeek_editor_style', 31 );
/**
 * [enqueue_vangeek_editor_style] Block styles for backend only.
 *
 * @return void
 */
function enqueue_vangeek_editor_style() {
	wp_enqueue_style(
		'vangeek-editor-styles',
		get_stylesheet_directory_uri() . '/css/editor-styles.css',
		array(),
		filemtime( get_stylesheet_directory() . '/css/editor-styles.css' ),
	);
}
