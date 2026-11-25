<?php
/**
 * Front-page hero (loaded with get_template_part).
 *
 * @package musterhausen-demo
 */
?>
<section class="hero" aria-labelledby="hero-title">
	<div>
		<h1 id="hero-title">Willkommen beim Bürgerservice der Stadt Musterhausen</h1>
		<p>Termine, Formulare und Informationen – rund um die Uhr online. Diese Website ist eine Demo und gehört zu keiner echten Stadt.</p>
	</div>
	<img class="hero-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-musterplatz.svg" width="480" height="270">
</section>
