<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<div class="widget-column">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php dynamic_sidebar( 'footer-1' ); ?>
	<?php endif; ?>
	</div><!-- .widget-column -->
	<div class="widget-column">
	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<?php dynamic_sidebar( 'footer-2' ); ?>
	<?php endif; ?>
	</div><!-- .widget-column -->

	<div class="widget-column">
	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<?php dynamic_sidebar( 'footer-3' ); ?>
	<?php endif; ?>
	</div><!-- .widget-column -->

	<div class="widget-column">
	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
		<?php dynamic_sidebar( 'footer-4' ); ?>
	<?php endif; ?>
</div><!-- .widget-column -->
