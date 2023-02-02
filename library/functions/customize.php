<?php
/**
 * Functions for registering and setting theme settings that tie into the WordPress theme customizer.  
 * This file loads additional classes and adds settings to the customizer for the built-in Hybrid Core 
 * settings.
 *
 * @package    HybridCore
 * @subpackage Functions
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2012, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/* Load custom control classes. */
add_action( 'customize_register', 'hybrid_load_customize_controls', 1 );

/* Register custom sections, settings, and controls. */
add_action( 'customize_register', 'hybrid_customize_register' );

/* Add the footer content Ajax to the correct hooks. */
add_action( 'wp_ajax_hybrid_customize_footer_content', 'hybrid_customize_footer_content_ajax' );
add_action( 'wp_ajax_nopriv_hybrid_customize_footer_content', 'hybrid_customize_footer_content_ajax' );

/**
 * Loads framework-specific customize control classes.  Customize control classes extend the WordPress 
 * WP_Customize_Control class to create unique classes that can be used within the framework.
 *
 * @since 1.4.0
 * @access private
 */
function hybrid_load_customize_controls() {

	/* Loads the textarea customize control class. */
	require_once( trailingslashit( HYBRID_CLASSES ) . 'customize-control-textarea.php' );
}

/**
 * Registers custom sections, settings, and controls for the $wp_customize instance.
 *
 * @since 1.4.0
 * @access private
 * @param object $wp_customize
 */
function hybrid_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'title_tagline' );
	
	/* Get supported theme settings. */
	$supports = get_theme_support( 'hybrid-core-theme-settings' );

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Get the default theme settings. */
	$default_settings = hybrid_get_default_theme_settings();
	
	/* Add the ultimate-offer section, setting, and control if theme supports the 'ultimate-offer' setting. */
	if ( is_array( $supports[0] ) && in_array( 'ultimate-offer', $supports[0] ) ) {

		/* Add the ultimate-offer (sales copy/offer) section. */
		$wp_customize->add_section(
			'hybrid-core-ultimate-offer',
			array(
				'title'      => esc_html__( 'Shortcodes', $prefix ),
				'priority'   => 195,
				'capability' => 'edit_theme_options'
			)
		);

		/* Add various 'uo_' ultimate offer settings. */
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_my_city]", array(
			'default'              => sanitize_text_field( $default_settings['uo_my_city'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-my-city', array(
			'label'    => esc_html__( '[MY_CITY]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_my_city]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_my_state]", array(
			'default'              => sanitize_text_field( $default_settings['uo_my_state'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-my-state', array(
			'label'    => esc_html__( '[MY_STATE]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_my_state]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_my_name]", array(
			'default'              => sanitize_text_field( $default_settings['uo_my_name'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-my-name', array(
			'label'    => esc_html__( '[MY_NAME]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_my_name]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_year]", array(
			'default'              => sanitize_text_field( $default_settings['uo_year'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-year', array(
			'label'    => esc_html__( '[YEAR]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_year]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_business_name]", array(
			'default'              => sanitize_text_field( $default_settings['uo_business_name'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-business-name', array(
			'label'    => esc_html__( '[BUSINESS_NAME]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_business_name]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_phone_number]", array(
			'default'              => sanitize_text_field( $default_settings['uo_phone_number'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-phone-number', array(
			'label'    => esc_html__( '[PHONE_NUMBER]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_phone_number]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_list_of_cities]", array(
			'default'              => sanitize_text_field( $default_settings['uo_list_of_cities'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-list-of-cities', array(
			'label'    => esc_html__( '[LIST_OF_CITIES]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_list_of_cities]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_list_of_zipcodes]", array(
			'default'              => sanitize_text_field( $default_settings['uo_list_of_zipcodes'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control('hybrid-core-uo-list-of-zipcodes', array(
			'label'    => esc_html__( '[LIST_OF_ZIPCODES]', $prefix),
			'section'  => 'hybrid-core-ultimate-offer',
			'settings' => "{$prefix}_theme_settings[uo_list_of_zipcodes]",
		));
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_trial_offer_shortcode]", array(
			'default'              => sanitize_text_field( $default_settings['uo_trial_offer_shortcode'] ),
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control(
			new Hybrid_Customize_Control_Textarea(
				$wp_customize,
				'hybrid-core-uo-trial-offer-shortcode',
				array(
					'label'    => esc_html__( 'Trial Offer Form Shortcode', 'hybrid-core' ),
					'section'  => 'hybrid-core-ultimate-offer',
					'settings' => "{$prefix}_theme_settings[uo_trial_offer_shortcode]",
				)
			)
		);
		
		$wp_customize->add_setting("{$prefix}_theme_settings[uo_sign_up_button]", array(
			'default'              => sanitize_text_field( $default_settings['uo_sign_up_button'] ),	//BUG showing: clearing the default value
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
		));
		$wp_customize->add_control(
			new Hybrid_Customize_Control_Textarea(
				$wp_customize,
				'hybrid-core-uo-sign-up-button',
				array(
					'label'    => esc_html__( '[SIGN_UP_BUTTON]', 'hybrid-core' ),
					'section'  => 'hybrid-core-ultimate-offer',
					'settings' => "{$prefix}_theme_settings[uo_sign_up_button]",
				)
			)
		);
	}

	/* Add the footer section, setting, and control if theme supports the 'footer' setting. */
	if ( is_array( $supports[0] ) && in_array( 'footer', $supports[0] ) ) {

		/* Add the footer section. */
		$wp_customize->add_section(
			'hybrid-core-footer',
			array(
				'title'      => esc_html__( 'Footer', 'hybrid-core' ),
				'priority'   => 198,
				'capability' => 'edit_theme_options'
			)
		);

		/* Add the 'footer_insert' setting. */
		$wp_customize->add_setting(
			"{$prefix}_theme_settings[footer_insert]",
			array(
				'default'              => $default_settings['footer_insert'],
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'hybrid_customize_sanitize',
				'sanitize_js_callback' => 'hybrid_customize_sanitize',
				'transport'            => 'postMessage',
			)
		);

		/* Add the textarea control for the 'footer_insert' setting. */
		$wp_customize->add_control(
			new Hybrid_Customize_Control_Textarea(
				$wp_customize,
				'hybrid-core-footer',
				array(
					'label'    => esc_html__( 'Footer', 'hybrid-core' ),
					'section'  => 'hybrid-core-footer',
					'settings' => "{$prefix}_theme_settings[footer_insert]",
					'description' => esc_html__( 'Bottom texts such as Copyright, legal links, & diclaimers (HTML ok)' ),
					'input_attrs' => array(
				         'style' => 'min-height:300px;',
				         'placeholder' => __( '' )
				      )
				)
			)
		);

		/* If viewing the customize preview screen, add a script to show a live preview. */
		if ( $wp_customize->is_preview() && !is_admin() )
			add_action( 'wp_footer', 'hybrid_customize_preview_script', 21 );
	}

	/* Add Theme Custom CSS section. */
	$wp_customize->add_section(
		'hybrid-core-misc_custom_css',
		array(
			'title'      => esc_html__( 'Minify CSS', 'hybrid-core' ),
			'priority'   => 220,
			'capability' => 'edit_theme_options'
		)
	);

	/* Add the 'misc_custom_css' setting. */
	$wp_customize->add_setting(
		"{$prefix}_theme_settings[misc_custom_css]",
		array(
			'default'              => $default_settings['misc_custom_css'],
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'hybrid_customize_sanitize',
			'sanitize_js_callback' => 'hybrid_customize_sanitize',
			'transport'            => 'postMessage',
		)
	);

	/* Add the textarea control for the 'misc_custom_css' setting. */
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Textarea(
			$wp_customize,
			'hybrid-core-misc_custom_css',
			array(
				'label'    => esc_html__( 'Minify CSS', 'hybrid-core' ),
				'section'  => 'hybrid-core-misc_custom_css',
				'settings' => "{$prefix}_theme_settings[misc_custom_css]",
				'description' => esc_html__( 'Copy and paste CSS from "Additional CSS" section to minify and make SEO friendly.' ),
				'input_attrs' => array(
			         'style' => 'height:100vh;',
			         'placeholder' => __( 'Enter CSS code directly...' ),
			         'id' => 'fwf_misc_custom_css_textarea'
			      )
			)
		)
	);
}

/**
 * Sanitizes the footer content on the customize screen.  Users with the 'unfiltered_html' cap can post 
 * anything.  For other users, wp_filter_post_kses() is ran over the setting.
 *
 * @since 1.4.0
 * @access public
 * @param mixed $setting The current setting passed to sanitize.
 * @param object $object The setting object passed via WP_Customize_Setting.
 * @return mixed $setting
 */
function hybrid_customize_sanitize( $setting, $object ) {

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Make sure we kill evil scripts from users without the 'unfiltered_html' cap. */
	if ( "{$prefix}_theme_settings[footer_insert]" == $object->id && !current_user_can( 'unfiltered_html' )  )
		$setting = stripslashes( wp_filter_post_kses( addslashes( $setting ) ) );

	/* Return the sanitized setting and apply filters. */
	return apply_filters( "{$prefix}_customize_sanitize", $setting, $object );
}

/**
 * Runs the footer content posted via Ajax through the do_shortcode() function.  This makes sure the 
 * shortcodes are output correctly in the live preview.
 *
 * @since 1.4.0
 * @access private
 */
function hybrid_customize_footer_content_ajax() {

	/* Check the AJAX nonce to make sure this is a valid request. */
	check_ajax_referer( 'hybrid_customize_footer_content_nonce' );

	/* If footer content has been posted, run it through the do_shortcode() function. */
	if ( isset( $_POST['footer_content'] ) )
		echo do_shortcode( wp_kses_stripslashes( $_POST['footer_content'] ) );

	/* Always die() when handling Ajax. */
	die();
}

/**
 * Handles changing settings for the live preview of the theme.
 *
 * @since 1.4.0
 * @access private
 */
function hybrid_customize_preview_script() {

	/* Create a nonce for the Ajax. */
	$nonce = wp_create_nonce( 'hybrid_customize_footer_content_nonce' );

	?>
	<script type="text/javascript">
	wp.customize(
		'<?php echo hybrid_get_prefix(); ?>_theme_settings[footer_insert]',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery.post( 
						'<?php echo admin_url( 'admin-ajax.php' ); ?>', 
						{ 
							action: 'hybrid_customize_footer_content',
							_ajax_nonce: '<?php echo $nonce; ?>',
							footer_content: to
						},
						function( response ) {
							jQuery( 'footer .copyright' ).html( response );
						}
					);
				}
			);
		}
	);
	</script>
	<?php
}



function fontsize_register($wp_customize) {

	$wp_customize->add_section('themename_text_size', array(
			'title'    => __('Font Size Options', 'themename'),
			'description' => '',
			'priority' => 90,
	));

	//  =============================
	//  H1 Font Size
	//  =============================
	$wp_customize->add_setting('locus_customize[h_one]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',

	));
	$wp_customize->add_control('themethemename_h1_size', array(
		'label'      => __('H1 Font Size (px)', 'themename'),
		'section'    => 'themename_text_size',
		'settings'   => 'locus_customize[h_one]',
	));

	//  =============================
	//  = H2 Input                =
	//  =============================
	$wp_customize->add_setting('locus_customize[h_two]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control('themename_h2_size', array(
			'label'      => __('H2 Font Size (px)', 'themename'),
			'section'    => 'themename_text_size',
			'settings'   => 'locus_customize[h_two]',
	));


	//  =============================
	//  = H3 Input                =
	//  =============================
	$wp_customize->add_setting('locus_customize[h_three]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control('themename_h3_size', array(
			'label'      => __('H3 Font Size (px)', 'themename'),
			'section'    => 'themename_text_size',
			'settings'   => 'locus_customize[h_three]',
	));

	//  =============================
	//  = H4 Input                =
	//  =============================
	$wp_customize->add_setting('locus_customize[h_four]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control('themename_h4_size', array(
			'label'      => __('H4 Font Size (px)', 'themename'),
			'section'    => 'themename_text_size',
			'settings'   => 'locus_customize[h_four]',
	));

	//  =============================
	//  = H5 Input                =
	//  =============================
	$wp_customize->add_setting('locus_customize[h_five]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control('themename_h5_size', array(
			'label'      => __('H5 Font Size (px)', 'themename'),
			'section'    => 'themename_text_size',
			'settings'   => 'locus_customize[h_five]',
	));


}

add_action('customize_register', 'fontsize_register');

add_action('wp_head', 'your_function_name');
function your_function_name(){
?>
<style>
html, body {
	background: <?php echo get_option('bg_color'); ?> !important;
}
</style>
<?php
};

?>