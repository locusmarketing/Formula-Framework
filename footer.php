<?php
/**
 * File
 *
 * Description
 *
 * @package    Templates
 * @version    1.0
 * @author     Fitness Website Formula
 * @link       http://fitnesswebsiteformula.com
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

if ( !is_page_template('templates/home-page.php') ):

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) { // Proceed only if on a WooCommerce page
			get_sidebar();
		} else {
			if( !is_singular('post')) get_sidebar( 'primary' );
		}

	} else  {
			get_sidebar( 'primary' );
	}

?>

<?php if( fwf_has_container() ) echo '</div><!-- /end pagewrap-->'; ?>

<?php endif; //end if not home ?>



</div><!-- /.background -->

</div><!-- /.shadow -->



<?php if( fwf_has_header_footer() ) { ?>

<footer>

	<div class="row footer_bar">

		<div class="twelve columns">

			<div class="row">

				<?php if (!dynamic_sidebar( 'Footer Area #1' )):?><?php endif; ?>

				<?php if (!dynamic_sidebar( 'Footer Area #2' )):?><?php endif; ?>

				<?php if (!dynamic_sidebar( 'Footer Area #3' )):?><?php endif; ?>

				<div class="recover"></div>

				<?php if (!dynamic_sidebar( 'Footer Area (SEO)' )):?><?php endif; ?>

			</div>

		</div>

	</div>

	<div class="bottom_bar">

		<?php if ( has_nav_menu('subsidiary') || has_nav_menu('bottom') || is_active_sidebar('footer_bottom') ): ?>

		<div class="row">

			<div class="twelve columns">

				<div class="row">

					<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template. ?>

					<?php get_template_part( 'menu', 'bottom' ); // Loads the menu-bottom.php template. ?>

					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'footer_bottom' ) ):?><?php endif; ?>

				</div>

			</div>

		</div>

		<?php endif; ?>



		<div class="footer_content">

			<div class="row">

				 <ul class="social_media">

					<li><?php _e( 'Follow us', 'fitnessthemes' ); ?></li>

					<?php if( $url_twitter = get_theme_mod('theme_url_facebook') ): ?><li class="facebook"><a href="<?php echo get_theme_mod('theme_url_facebook') ?>" target="_new" rel="me"><i class="fab fa-facebook"></i></a></li><?php endif; ?>

		 		 <?php if( $url_twitter = get_theme_mod('theme_url_twitter') ): ?><li class="twitter"><a href="<?php echo $url_twitter ?>" target="_new" rel="me"><i class="fab fa-twitter"></i></a></li><?php endif; ?>

		 		 <?php if( $url_youtube = get_theme_mod('theme_url_youtube') ): ?><li class="youtube"><a href="<?php echo $url_youtube ?>" target="_new" rel="me"><i class="fab fa-youtube"></i></a></li><?php endif; ?>

		 		 <?php if( $url_instagram = get_theme_mod('theme_url_instagram') ): ?><li class="instagram"><a href="<?php echo $url_instagram ?>" target="_new" rel="me"><i class="fab fa-instagram"></i></a></li><?php endif; ?>

		 		 <?php if( $url_googleplus = get_theme_mod('theme_url_googleplus') ): ?><li class="googleplus"><a href="<?php echo $url_googleplus ?>" target="_new" rel="publisher"><i class="fab fa-google"></i></a></li><?php endif; ?>

		 		 <?php if( $url_yelp = get_theme_mod('theme_url_yelp') ): ?><li class="yelp"><a href="<?php echo $url_yelp ?>" target="_new" rel="me"><i class="fab fa-yelp"></i></a></li><?php endif; ?>

				</ul>

				<div class="copyright"><?php hybrid_footer_content(); ?></div>

			</div>

		</div>

	</div>

</footer><!-- End Footer -->

<?php } //end if fwf_has_header_footer ?>



<?php if( !is_front_page() && hybrid_get_setting( 'offer_tab_name' ) ): ?><div class="follow-button"><a <?php if( hybrid_get_setting( 'offer_tab_url' )):?>href="<?php echo hybrid_get_setting( 'offer_tab_url' ); ?>"<?php else: ?>href="#" class="<?php echo hybrid_get_setting( 'offer_tab_class' ); ?>"<?php endif; ?> rel="nofollow"><?php echo hybrid_get_setting( 'offer_tab_text' ); ?></a></div><?php endif;?>



</div>


<?php wp_footer(); ?>


<style>
.mobile__nav-container {
	position: fixed !important;
	top: 0;
	left: 0;
	width: 100%;
}
.menu-main-navigation-container, .mobile__nav-navigation, .mobile__nav-menu.open, .mobile__nav-menu {
	padding-top: 3.5rem;
	width: 100% !important;
	top: 0;
}
.mobile__nav-social {
	display: none;
}
.mobile__nav-menu.open, .mobile__nav-menu {
	top: 0 !important;
}

.mobile__nav-menu li a {
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.mobile__nav-menu .sub-menu {
	display: none;
}
</style>

<script>
jQuery(document).ready(function($) {
	$('.mobile__nav-menu .sub-menu').prev().click(function(e) {
		e.preventDefault();
		$(this).next().slideToggle();
	})
})
</script>

</body>

</html>
