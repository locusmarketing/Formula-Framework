<?php
class FwfBlog extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );
        add_shortcode( 'fwf_blog', array( $this, 'render_shortcode' ) );

    }

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map blockquote with vc_map()
        vc_map( array(
          'name'          => __('FWF Blog Posts', 'fwf'),
          'base'          => 'fwf_blog',
          //"icon" => "//fitnesswebsiteformula.com/wp-content/uploads/2020/02/favicon.png",
          "icon" => trailingslashit( get_template_directory_uri() ) . "images/favicon.png",
          'description'  	=> __( '', 'fwf' ),
          'category'      => __( 'FWF Modules', 'fwf'),
          'params'   => array(
            array(
              'type'        => 'dropdown',
              'heading'     => __('Blog Layout'),
              'param_name'  => 'layout',
              'admin_label' => true,
              'value'       => array(
              'One'   => 'one',
              'Two'   => 'two',
              ),
              'std'         => 'One', // Your default value
              'description' => __('Select Blog Template')
              )
            )
       ));


    }

    public function render_shortcode( $atts, $content, $tag ) {

        $atts = (shortcode_atts(array(
            'layout' => '',
        ), $atts));


        //Content
        $content            = wpb_js_remove_wpautop($content, true);
        $blog_type       = esc_html($atts['layout']);

        //Cite Link
        $blockquote_source  = vc_build_link( $atts['blockquote_cite'] );
        $blockquote_title   = esc_html($blockquote_source["title"]);
        $blockquote_url     = esc_url( $blockquote_source['url'] );

        //Class and Id
        $extra_class        = esc_attr($atts['extra_class']);

        $blog_type = str_replace(' ', '-', strtolower($blog_type));

        include_once('template-'.$blog_type.'__blog.php');

    }

}

new FwfBlog();
