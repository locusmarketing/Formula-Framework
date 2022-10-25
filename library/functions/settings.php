<?php
/**
 * Functions for dealing with theme settings on both the front end of the site and the admin.  This allows us 
 * to set some default settings and make it easy for theme developers to quickly grab theme settings from 
 * the database.  This file is only loaded if the theme adds support for the 'hybrid-core-theme-settings' 
 * feature.
 *
 * @package    HybridCore
 * @subpackage Functions
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2012, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/**
 * Loads the Hybrid theme settings once and allows the input of the specific field the user would 
 * like to show.  Hybrid theme settings are added with 'autoload' set to 'yes', so the settings are 
 * only loaded once on each page load.
 *
 * @since 0.7.0
 * @access public
 * @uses get_option() Gets an option from the database.
 * @uses hybrid_get_prefix() Gets the prefix of the theme.
 * @global object $hybrid The global Hybrid object.
 * @param string $option The specific theme setting the user wants.
 * @return mixed $settings[$option] Specific setting asked for.
 */
function hybrid_get_setting( $option = '' ) {
	global $hybrid;

	/* If no specific option was requested, return false. */
	if ( !$option )
		return false;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $hybrid->settings ) )
		$hybrid->settings = get_option( hybrid_get_prefix() . '_theme_settings', hybrid_get_default_theme_settings() );

	/* If the settings isn't an array or the specific option isn't in the array, return false. */
	if ( !is_array( $hybrid->settings ) || empty( $hybrid->settings[ $option ] ) )
		return false;

	/* If the specific option is an array, return it. */
	if ( is_array( $hybrid->settings[ $option ] ) )
		return $hybrid->settings[ $option ];

	/* Strip slashes from the setting and return. */
	else
		return wp_kses_stripslashes( $hybrid->settings[ $option ] );
}

/**
 * Sets up a default array of theme settings for use with the theme.  Theme developers should filter the 
 * "{$prefix}_default_theme_settings" hook to define any default theme settings.  WordPress does not 
 * provide a hook for default settings at this time.
 *
 * @since 1.0.0
 * @access public
 * @return array $settings The default theme settings.
 */
function hybrid_get_default_theme_settings() {

	/* Set up some default variables. */
	$settings = array();
	$prefix = hybrid_get_prefix();

	/* Get theme-supported meta boxes for the settings page. */
	$supports = get_theme_support( 'hybrid-core-theme-settings' );

	/* If the current theme supports a meta box and shortcodes, add default settings. */
	if ( is_array( $supports[0] ) && current_theme_supports( 'hybrid-core-shortcodes' ) ) {

		if (in_array( 'footer', $supports[0] )) {
			/* If there is a child theme active, add the [child-link] shortcode to the $footer_insert. */
			if ( is_child_theme() )
				$settings['footer_insert'] = '<div class="copyright">' . __( 'Copyright &#169; [the-year] [site-link].', 'fitnessthemes' ) . ' | <a href="#">' . __( 'Sitemap', 'fitnessthemes' ) . '</a> | <a href="#">' . __( 'Terms of Use', 'fitnessthemes' ) . '</a> | <a href="#">' . __( 'Privacy Policy', 'fitnessthemes' ) . '</a><br/><a href="https://fitnesswebsiteformula.com/?utm_source=clientwebsites&utm_medium=textlink&utm_content=companyname&utm_campaign=clientfooter?ref=ClientSite" target="_blank">Fitness Web Design</a> ' . __( 'Powered by [theme-link].', 'fitnessthemes' ) . '</div>';

			/* If no child theme is active, leave out the [child-link] shortcode. */
			else
				$settings['footer_insert'] = '<div class="copyright">' . __( 'Copyright &#169; [the-year] [site-link].', 'fitnessthemes' ) . ' | <a href="#">' . __( 'Sitemap', 'fitnessthemes' ) . '</a> | <a href="#">' . __( 'Terms of Use', 'fitnessthemes' ) . '</a> | <a href="#">' . __( 'Privacy Policy', 'fitnessthemes' ) . '</a><br/><a href="https://fitnesswebsiteformula.com/?utm_source=clientwebsites&utm_medium=textlink&utm_content=companyname&utm_campaign=clientfooter?ref=ClientSite" target="_blank">Fitness Website Design</a></div>';
		}
		
		if (in_array( 'ultimate-offer', $supports[0] )) {
			$settings['offer_tab_class'] = 'popmake-5222';
			$settings['uo_my_city'] = 'Los Angeles';
			$settings['uo_my_state'] = 'California';
			$settings['uo_year'] = '2004';
			$settings['uo_my_name'] = 'John Doe';
			$settings['uo_business_name'] = 'Fitness Pro';
			$settings['uo_phone_number'] = '(555) 555-5555';
			$settings['uo_address'] = '777 Fitness Way, Los Angeles';
			$settings['uo_list_of_cities'] = 'City1, City 2, etc';
			$settings['uo_list_of_zipcodes'] = '99998, 99999';
			$settings['uo_sign_up_button'] = '';
		}
	}

	/* Return the $settings array and provide a hook for overwriting the default settings. */
	return apply_filters( "{$prefix}_default_theme_settings", $settings );
}

?>