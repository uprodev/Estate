<?php get_header(); ?>

<?php 
global $query_string;
parse_str( $query_string, $my_query_array );
$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
$wp_query = new WP_Query(array('post_type' => 'objects', 'posts_per_page' => 8, 'paged' => $paged));
if($wp_query->have_posts()): 
	?>

	<div class="content" id="response_objects">

		<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

			<?php get_template_part('parts/content', 'objects') ?>

		<?php endwhile; ?>

	</div>

<?php endif ?>

<div class="pagination-wrap">

	<?php $args = array(
		'show_all'     => false,
		'end_size'     => 1,
		'mid_size'     => 1,
		'prev_next'    => true,
		'prev_text'    => '<img src="' . get_stylesheet_directory_uri() . '/img/icon-19-1.svg" alt="">',
		'next_text'    => '<img src="' . get_stylesheet_directory_uri() . '/img/icon-19-2.svg" alt="">',
		'add_args'     => false,
		'add_fragment' => '',
		'screen_reader_text' => __( 'Posts navigation' ),
		'type' => 'list',
	);
	the_posts_pagination($args); 
	?>

</div>

<?php wp_reset_query() ?>

<?php get_footer(); ?>