<?php
/**
 * Front page and news list ("Aktuelles").
 *
 * @package musterhausen-demo
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php if ( is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/hero' ); ?>
		<section class="services" aria-labelledby="services-title">
			<h2 id="services-title">Unsere Services</h2>
			<ul class="service-tiles">
				<li class="service-tile"><a href="<?php echo esc_url( home_url( '/termin-buchen/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M3 10h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="2"/></svg><span class="service-title">Termin buchen</span><span>Online einen Termin im Bürgerbüro vereinbaren.</span></a></li>
				<li class="service-tile"><a href="<?php echo esc_url( home_url( '/formulare/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 3h9l3 3v15H6z M9 10h6M9 14h6" stroke="currentColor" stroke-width="2" fill="none"/></svg><span class="service-title">Formulare &amp; Anträge</span><span>Anträge herunterladen oder online stellen.</span></a></li>
				<li class="service-tile"><a href="<?php echo esc_url( home_url( '/abfallkalender/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 7h14l-1 14H6z M9 4h6v3" stroke="currentColor" stroke-width="2" fill="none"/></svg><span class="service-title">Abfallkalender</span><span>Abholtermine für Ihre Straße.</span></a></li>
				<li class="service-tile"><a href="<?php echo esc_url( home_url( '/buergerbuero/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 21h18M5 21V10l7-5 7 5v11M10 21v-6h4v6" stroke="currentColor" stroke-width="2" fill="none"/></svg><span class="service-title">Bürgerbüro</span><span>Öffnungszeiten, Leistungen und Kontakt.</span></a></li>
			</ul>
		</section>
	<?php else : ?>
		<h1><?php esc_html_e( 'Aktuelles', 'musterhausen-demo' ); ?></h1>
	<?php endif; ?>

	<section aria-labelledby="news-title">
		<h2 id="news-title">Aktuelles aus Musterhausen</h2>
		<?php if ( have_posts() ) : ?>
			<ul class="news-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<li class="news-item">
						<img class="news-thumb" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/news-rathaus.svg" width="96" height="96">
						<div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="news-meta"><?php echo esc_html( get_the_date() ); ?></p>
							<?php the_excerpt(); ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php else : ?>
			<p><?php esc_html_e( 'Derzeit gibt es keine Meldungen.', 'musterhausen-demo' ); ?></p>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
