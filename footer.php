<?php
/**
 * Footer: contact, opening hours, social links, newsletter.
 *
 * All contact data is FICTIONAL (reserved .example domain, placeholder numbers).
 *
 * @package musterhausen-demo
 */
?>
<footer class="site-footer">
	<div class="footer-inner">
		<section aria-labelledby="footer-contact">
			<h2 id="footer-contact">Kontakt</h2>
			<address>
				Stadt Musterhausen (fiktiv)<br>
				Bürgerbüro, Musterplatz 1<br>
				00000 Musterhausen<br>
				Telefon: 0000 000000 (fiktiv)<br>
				E-Mail: <a href="mailto:buergerservice@musterhausen.example">buergerservice@musterhausen.example</a>
			</address>
		</section>
		<section aria-labelledby="footer-hours">
			<h2 id="footer-hours">Öffnungszeiten Bürgerbüro</h2>
			<dl class="opening-hours">
				<dt>Mo, Di, Do</dt><dd>8:00–16:00 Uhr</dd>
				<dt>Mi</dt><dd>8:00–18:00 Uhr</dd>
				<dt>Fr</dt><dd>8:00–12:00 Uhr</dd>
			</dl>
		</section>
		<section aria-labelledby="footer-social">
			<h2 id="footer-social">Musterhausen im Netz</h2>
			<ul class="social-links">
				<li><a href="https://www.instagram.com/" class="social-link social-instagram" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/></svg></a></li>
				<li><a href="https://joinmastodon.org/" class="social-link social-mastodon" aria-label="Musterhausen auf Mastodon (Demo)"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 5h14v10H9l-4 4z" stroke="currentColor" stroke-width="2" fill="none"/></svg></a></li>
			</ul>
			<?php echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/badge-digitale-verwaltung.svg' ) . '" class="footer-badge" width="120" height="40">'; ?>
		</section>
		<section aria-labelledby="footer-newsletter">
			<h2 id="footer-newsletter">Newsletter</h2>
			<form class="newsletter" action="<?php echo esc_url( home_url( '/newsletter/' ) ); ?>" method="post">
				<label for="newsletter-email">E-Mail-Adresse für den Rathaus-Newsletter</label>
				<div class="newsletter-row">
					<input type="email" id="newsletter-email" name="newsletter_email" class="newsletter-email" autocomplete="mail">
					<button class="newsletter-submit">Anmelden</button>
				</div>
			</form>
		</section>
	</div>
	<p class="footer-legal">Demo – fiktive Website, keine echte Behörde. <a href="<?php echo esc_url( home_url( '/impressum/' ) ); ?>">Impressum</a> · <a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>">Datenschutz</a> · <a href="<?php echo esc_url( home_url( '/barrierefreiheit/' ) ); ?>">Erklärung zur Barrierefreiheit</a></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
