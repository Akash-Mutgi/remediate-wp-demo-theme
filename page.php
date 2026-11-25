<?php
/**
 * The template for single pages.
 *
 * @package gruenwerk-demo
 */

get_header();
$gruenwerk_banner = get_template_directory_uri() . '/assets/img/greenhouse.svg';
?>
<main id="primary" class="site-main">
	<img class="page-banner" src="<?php echo esc_url( $gruenwerk_banner ); ?>" alt="<?php echo esc_attr( basename( $gruenwerk_banner ) ); ?>">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
