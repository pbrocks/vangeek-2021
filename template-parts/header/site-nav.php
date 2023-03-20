<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'vangeek-2021' ); ?>">
		<div class="menu-button-container">
			<button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
				<span class="dropdown-icon open"><?php esc_html_e( 'Menu', 'vangeek-2021' ); ?>
					<?php echo twenty_twenty_one_get_icon_svg( 'ui', 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</span>
				<span class="dropdown-icon close"><?php esc_html_e( 'Close', 'vangeek-2021' ); ?>
					<?php echo twenty_twenty_one_get_icon_svg( 'ui', 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</span>
			</button><!-- #primary-mobile-menu -->
		</div><!-- .menu-button-container -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>

<?php if ( has_nav_menu( 'contact' ) ) : ?>
	<nav aria-label="<?php esc_attr_e( 'Contact menu', 'vangeek-2021' ); ?>" class="contact-navigation">
		<ul class="contact-navigation-wrapper">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'contact',
					'items_wrap'     => '%3$s',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span>',
					'link_after'     => '</span>',
					'fallback_cb'    => false,
				)
			);
			?>
		</ul><!-- .contact-navigation-wrapper -->
	</nav><!-- .contact-navigation -->
<?php endif; ?>
