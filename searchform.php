<?php
/**
 * The search form.
 *
 * @package gruenwerk-demo
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit" class="search-submit"><?php esc_html_e( 'Search', 'gruenwerk-demo' ); ?></button>
</form>
