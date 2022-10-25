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
$prefix = hybrid_get_prefix();
$page_background = '';
$logo_tag = 'div';

if( is_page() )
	$page_background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

if( is_front_page() ) 
	$logo_tag = 'h1';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="color-scheme" content="only light">
	<title><?php hybrid_document_title(); ?></title>
	<?php do_action('fb_gtm_header'); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" href="<?php bloginfo( 'url' ); ?>" hreflang="en-us" />
	<?php wp_head(); ?>
	<?php do_action('fwf_head'); ?>
	<?php echo "\n\r\t";  if($fwf_favicon = ( get_theme_mod($prefix.'_favicon') ) ? get_theme_mod($prefix.'_favicon') : trailingslashit( get_template_directory_uri() ) . 'images/favicon-fwf.png'): ?><link rel="shortcut icon" href="<?php echo $fwf_favicon;?>" type="image/x-icon" />
<?php endif; ?>
</head>

<body class="<?php hybrid_body_class(); ?>" id="locus-marketing">
<?php do_action('fb_after_body'); //get_template_part( 'menu', 'secondary' ); // Loads the menu-primary.php template. ?>
<?php echo hybrid_get_setting('misc_after_body'); ?>
<div class="fwf-root">
<div class="shadow">

<div class="background"<?php echo ( $page_background ) ? ' style="background:url(' . $page_background[0] . ') no-repeat center top;background-attachment:fixed;"': '';?>>

<?php if( fwf_has_header_footer() ) {
$header_cols = fwf_getHeaderCols();

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'top_bar' ) ) { //do nothing
}
?>
<a id="fwf-skip-link" class="screen-reader-text" href="#content">Skip to content</a>

<?php if( !isUserAgentMobile() ): //Hide on mobile ?>
<header class="header">
	<div class="row">

		<div class="row">
			<div class="<?php echo $header_cols['left']; ?> columns">
				<?php if ( get_theme_mod( $prefix.'_logo' ) ) : ?>
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo str_replace( 'http://', '//', get_theme_mod( $prefix.'_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					</div>
				<?php else : ?>
				<<?php echo $logo_tag;?> id="site-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $logo_tag;?>>
				<?php endif; ?>
			</div>
			<div class="<?php echo $header_cols['right']; ?> columns">
				<?php if ( get_header_image() ): ?>
					<?php echo '<img class="header-image" src="' . esc_url( get_header_image() ) . '" alt="personal training" />';  ?>
				<?php elseif( hybrid_get_setting( 'uo_phone_number' ) || hybrid_get_setting( 'uo_address' ) || hybrid_get_setting( 'theme_url_member_login' ) ): ?>

					<?php if( !get_theme_mod('theme_hide_h_social') ): ?><div class="social_icons"><?php do_action('fwf_social_icons'); ?></div><? endif; ?>

					<?php do_action('fwf_business_meta'); ?>

				<?php else: ?>
				<h2 id="site-description">
					<small><?php bloginfo( 'description' ); ?></small>
				</h2>
				<?php endif; ?>

				<div class="top-navbar">
					<?php if (!is_pageNavHidden()) get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
				</div>

			</div>
		</div>
	</div>
</header>
<?php endif; //End mobile detection

} //end if fwf_has_header_footer ?>

<?php if ( !is_page_template('templates/home-page.php') ): ?>

<!-- Main Page Content and Sidebar -->
<?php do_action( 'fwf_before_pagestarts' ); ?>

<?php echo fwf_has_container() ?>

<?php endif; ?>

<?php if( isUserAgentMobile() ): //Show on mobile only 
    $logoimg_url = ( $mobile_img = get_theme_mod( $prefix.'_logo_mobile' ) ) ? $mobile_img : get_theme_mod( $prefix.'_logo' );
?>
<div class="mobile__nav">
	<div class="mobile__nav-container">
		<<?php echo $logo_tag;?> class="mobile__nav-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo str_replace( 'http://', '//', $logoimg_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</a>
		</<?php echo $logo_tag;?>>
		<div class="mobile__nav-icon">
			<div id="nav-icon">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
		</div>
	</div>
</div>

<div class="mobile__nav-background"></div>

<div class="mobile__nav-menu">
	<div class="mobile__nav-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>
	<div class="mobile__nav-social">
		<ul class="social_media">

		 <?php if( $url_facebook = get_theme_mod('theme_url_facebook') ): ?><li class="facebook"><a href="<?php echo $url_facebook ?>" target="_new" rel="me"><i class="fab fa-facebook"></i><label>Facebook</label></a></li><?php endif; ?>

		 <?php if( $url_twitter = get_theme_mod('theme_url_twitter') ): ?><li class="twitter"><a href="<?php echo $url_twitter ?>" target="_new" rel="me"><i class="fab fa-twitter"></i><label>Twitter</label></a></li><?php endif; ?>

		 <?php if( $url_youtube = get_theme_mod('theme_url_youtube') ): ?><li class="youtube"><a href="<?php echo $url_youtube ?>" target="_new" rel="me"><i class="fab fa-youtube"></i><label>YouTube</label></a></li><?php endif; ?>

		 <?php if( $url_instagram = get_theme_mod('theme_url_instagram') ): ?><li class="instagram"><a href="<?php echo $url_instagram ?>" target="_new" rel="me"><i class="fab fa-instagram"></i><label>Instagram</label></a></li><?php endif; ?>

		 <?php if( $url_googleplus = get_theme_mod('theme_url_googleplus') ): ?><li class="googleplus"><a href="<?php echo $url_googleplus ?>" target="_new" rel="publisher"><i class="fab fa-google"></i></a><label>Google</label></li><?php endif; ?>

		 <?php if( $url_yelp = get_theme_mod('theme_url_yelp') ): ?><li class="yelp"><a href="<?php echo $url_yelp ?>" target="_new" rel="me"><i class="fab fa-yelp"></i><label>Yelp</label></a></li><?php endif; ?>

	 </ul>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$(document).ready(function(){
			$('#nav-icon').click(function() {
				$(this).toggleClass('open');
				$('.mobile__nav-background').toggleClass('open');
				$('.mobile__nav-menu').toggleClass('open');
			});

			$('.mobile__nav-background').click(function() {
				$('#nav-icon').toggleClass('open');
				$('.mobile__nav-background').toggleClass('open');
				$('.mobile__nav-menu').toggleClass('open');
			});

		});
	});
</script>
<?php endif; //End mobile ?>