<?php
/**
 * The textarea customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create textarea settings within the WordPress theme customizer.
 *
 * @package    Hybrid
 * @subpackage Classes
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2012, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/**
 * Textarea customize control class.
 *
 * @since 1.4.0
 */
class Hybrid_Customize_Control_Textarea extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.4.0
	 */
	public $type = 'textarea';

	/**
	 * Displays the textarea on the customize screen.
	 *
	 * @since 1.4.0
	 */
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="customize-control-content">
				<textarea class="widefat" cols="45" rows="7" <?php $this->link(); ?> <?php $this->fwf_input_attrs(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				<?php if($this->description): ?><p><em><?php echo esc_html( $this->description ); ?></em></p><?php endif; ?>
				<?php if($this->section == 'hybrid-core-misc_custom_css'): echo '<div id="ace_fwf_theme_css"></div>'; endif;?>
			</div>
		</label>
	<?php }

	public function fwf_input_attrs() {
	    foreach ( $this->input_attrs as $attr => $value ) {
	        echo $attr . '="' . esc_attr( $value ) . '" ';
	    }
	}
}

?>