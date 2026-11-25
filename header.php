<?php
/**
 * The header for the Gruenwerk Demo theme.
 *
 * @package gruenwerk-demo
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<svg xmlns="http://www.w3.org/2000/svg" style="display:none">
	<symbol id="icon-menu" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" fill="none"/></symbol>
	<symbol id="icon-instagram" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/></symbol>
</svg>
<header id="masthead" class="site-header">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-link" rel="home">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.svg" class="site-logo" width="160" height="48">
	</a>
	<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><svg aria-hidden="true"><use href="#icon-menu"></use></svg></button>
	<nav id="site-navigation" class="main-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => false ) ); ?>
	</nav>
</header>
