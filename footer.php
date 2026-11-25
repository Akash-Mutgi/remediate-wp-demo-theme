<?php
/**
 * The footer for the Gruenwerk Demo theme.
 *
 * @package gruenwerk-demo
 */
?>
<footer class="site-footer">
	<a href="https://www.instagram.com/" class="social-link social-instagram"><svg aria-hidden="true"><use href="#icon-instagram"></use></svg></a>
	<form class="newsletter" action="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" method="post">
		<label for="newsletter-email"><?php esc_html_e( 'Newsletter', 'gruenwerk-demo' ); ?></label>
		<input type="email" id="newsletter-email" name="newsletter_email" class="newsletter-email" autocomplete="mail">
		<button type="submit"><?php esc_html_e( 'Subscribe', 'gruenwerk-demo' ); ?></button>
	</form>
	<?php echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/payment-methods.svg' ) . '" class="payment-methods">'; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
