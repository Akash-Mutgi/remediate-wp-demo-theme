<?php
/**
 * Search form (header).
 *
 * @package musterhausen-demo
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit" class="search-submit"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="10" cy="10" r="6" stroke="currentColor" stroke-width="2" fill="none"/><path d="M15 15l5 5" stroke="currentColor" stroke-width="2"/></svg></button>
</form>
