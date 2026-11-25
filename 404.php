<?php
/**
 * The template for 404 (not found) pages.
 *
 * @package gruenwerk-demo
 */

get_header();
?>
<main id="primary" class="site-main">
	<h1><?php esc_html_e( 'Page not found', 'gruenwerk-demo' ); ?></h1>
	<p><?php esc_html_e( 'Try a search instead:', 'gruenwerk-demo' ); ?></p>
	<?php get_search_form(); ?>
</main>
<?php
get_footer();
