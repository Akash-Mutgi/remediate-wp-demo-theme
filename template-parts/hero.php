<?php
/**
 * Hero block shown on pages (loaded with get_template_part).
 *
 * @package gruenwerk-demo
 */
?>
<section class="hero">
	<img class="hero-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/greenhouse.svg">
	<p class="hero-text"><?php esc_html_e( 'Fresh from our greenhouse.', 'gruenwerk-demo' ); ?></p>
</section>
