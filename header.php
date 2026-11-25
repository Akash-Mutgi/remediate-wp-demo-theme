<?php
/**
 * Header: demo notice, logo, "Leichte Sprache", search and main navigation.
 *
 * @package musterhausen-demo
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary">Zum Inhalt springen</a>
<header id="masthead" class="site-header">
	<p class="demo-banner">Demo – fiktive Website, keine echte Behörde</p>
	<div class="header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-link" rel="home">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo-musterhausen.svg" class="site-logo" width="56" height="56" alt="Stadt Musterhausen Bürgerservice – zur Startseite">
			<span class="brand-text">
				<span class="brand-name">Stadt Musterhausen</span>
				<span class="brand-tagline">Bürgerservice</span>
			</span>
		</a>
		<div class="header-tools">
			<a class="easy-language" href="<?php echo esc_url( home_url( '/leichte-sprache/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 5h16v14H4z M8 9h8 M8 13h6" stroke="currentColor" stroke-width="2" fill="none"/></svg>Leichte Sprache</a>
			<?php get_search_form(); ?>
		</div>
	</div>
	<nav class="main-navigation" aria-label="Hauptnavigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => 'musterhausen_demo_menu_fallback',
			)
		);
		?>
	</nav>
</header>
