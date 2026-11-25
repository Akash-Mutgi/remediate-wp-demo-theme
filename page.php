<?php
/**
 * Single page.
 *
 * @package musterhausen-demo
 */

get_header();
$musterhausen_banner        = get_template_directory_uri() . '/assets/img/banner-buergerbuero.svg';
$musterhausen_banner_alt    = (string) get_post_meta( get_queried_object_id(), 'banner_alt', true );
$musterhausen_banner_credit = (string) get_post_meta( get_queried_object_id(), 'banner_credit', true );
?>
<main id="primary" class="site-main">
	<img class="page-banner" src="<?php echo esc_url( $musterhausen_banner ); ?>" alt="<?php echo esc_attr( $musterhausen_banner_alt ); ?> <?php echo esc_attr( $musterhausen_banner_credit ); ?>" width="960" height="240">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
