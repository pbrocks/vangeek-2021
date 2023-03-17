<?php
/**
 * Child Theme Functions File
 *
 * [description]
 */

add_action( 'wp_enqueue_scripts', 'enqueue_wp_child_theme' );
function enqueue_wp_child_theme() {
	if ( ( esc_attr( get_option( 'vangeek_setting_x' ) ) != 'Yes' ) ) {
		// This is your parent stylesheet you can choose to include or exclude this by going to your Child Theme Settings under the "Settings" in your WP Dashboard
		wp_enqueue_style( 'parent-css', get_template_directory_uri() . '/style.css' );
	}

	// This is your child theme stylesheet = style.css
	wp_enqueue_style(
		'child-css',
		get_stylesheet_uri()
	);

	// This is your child theme js file = js/script.js
	wp_enqueue_script(
		'child-js',
		get_stylesheet_directory_uri() . '/js/script.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}

// Hook into editor only hook
add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_styles_scripts' );
/**
 * Enqueue block-name main JavaScript file for the editor
 */
function enqueue_block_editor_styles_scripts() {
	$filepath = '/css/editor.css';

	wp_enqueue_script(
		'css-file-name',
		get_stylesheet_directory_uri() . $filepath,
		[],
		filemtime( get_stylesheet_directory() . $filepath )
	);
}

add_action( 'after_setup_theme', 'vangeek_2021_child_theme_setup' );
/**
 * [vangeek_2021_child_theme_setup]
 *
 * @return [type] [description]
 */
function vangeek_2021_child_theme_setup() {
	if ( ! get_theme_mod( 'background_color', false ) ) {
		set_theme_mod( 'background_color', 'ffffff' );
	}

	unregister_nav_menu( 'footer' );

	register_nav_menus(
		array(
			'contact'    => esc_html__( 'Contact menu', 'vangeek-2021' ),

			'privacy'    => esc_html__( 'Privacy menu', 'vangeek-2021' ),

			'quicklinks' => esc_html__( 'Quick Links', 'vangeek-2021' ),

			'social'     => esc_html__( 'Social menu', 'vangeek-2021' ),
		)
	);
}


add_action( 'admin_init', 'vangeek_register_settings' );
/**
 * [vangeek_register_settings description]
 *
 * @return  [type]  [return description]
 */
function vangeek_register_settings() {
	register_setting( 'vangeek_theme_options_group', 'vangeek_setting_x', 'ctwp_callback' );
}

// ChildThemeWP.com Options Page
function vangeek_register_options_page() {
	add_options_page( 'Child Theme Settings', 'My Child Theme', 'manage_options', 'vangeek', 'vangeek_theme_options_page' );
}
add_action( 'admin_menu', 'vangeek_register_options_page' );

// ChildThemeWP.com Options Form
function vangeek_theme_options_page() {  ?>
<div>
	<style>
		table.vangeek {table-layout: fixed ;  width: 100%; vertical-align:top; }
		table.vangeek td { width:50%; vertical-align:top; padding:0px 20px; }
		#vangeek_settings { padding:0px 20px; }
	</style>
	<div id="vangeek_settings">
		<h1>Child Theme Options</h1>
	</div>
	<table class="vangeek">
		<tr>
			<td>
				<form method="post" action="options.php">
					<h2>Parent Theme Stylesheet Include or Exclude</h2>
					<?php settings_fields( 'vangeek_theme_options_group' ); ?>
					<p><label><input size="76" type="checkbox" name="vangeek_setting_x" id="vangeek_setting_x"
					<?php
					if ( ( esc_attr( get_option( 'vangeek_setting_x' ) ) == 'Yes' ) ) {
						echo " checked='checked' ";
					}
					?>
					value="Yes" >
					TICK To DISABLE The Parent Stylesheet style.css In Your Site HTML<br><br>
					ONLY TICK This Box If When You Inspect Your Source Code It Contains Your Parent Stylesheet style.css Two Times. Ticking This Box Will Only Include It Once.</label></p>
					<?php submit_button(); ?>
				</form>
			</td>
			<td>
				<h2>More From The Author</h2>
				<p><b>Would you like your website speed to be faster?</b> I used WP Engine to build one of the fastest WordPress websites in the World <a href="https://shareasale.com/r.cfm?b=779590&u=1897845&m=41388&urllink=&afftrack=">WP Engine - Get 3 months free on annual plans</a> [affiliate link]</p>
				<p><b>Find out about how I built one fo the fastest WordPress websites in the World</b> <a href="https://www.wpspeedupoptimisation.com?ref=ChildThemeWP" target="_blank">I followed these steps</a></p>
			</td>
		</tr>
	</table>
</div>
	<?php
}

add_action( 'wp_footer', 'vangeek_footer_copyright' );
/**
 * Footer Copyright
 *
 * @return void
 */
function vangeek_footer_copyright() {
	?>
		<div id="vangeek-footer-copyright">
			<p>
				<?php echo __( '©2022 Funder Trading. All Rights Reserved.', 'api-guys-2021' ); ?>
			</p>
		</div>
	<?php
}
