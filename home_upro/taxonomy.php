<?php get_header(); ?>

<div class="content" id="response_objects">

	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?> 

			<?php get_template_part('parts/content', 'objects') ?>

		<?php endwhile; ?>
	<?php endif; ?>

</div>

<?php get_template_part('parts/pagination') ?>

<?php get_footer(); ?>