<?php
/**
 * The main template file.
 *
 * @package gruenwerk-demo
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h2><img class="post-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/leaf.svg"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing here yet.', 'gruenwerk-demo' ); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
