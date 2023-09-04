<?php get_header(); ?>

<?php 
global $query_string;
parse_str( $query_string, $my_query_array );
$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
$wp_query = new WP_Query(array('post_type' => 'objects', 'posts_per_page' => 8, 'tax_query' => array(array('taxonomy' => 'sold', 'field' => 'id', 'terms' => '73', 'operator' => 'NOT IN')), 'paged' => $paged));
if($wp_query->have_posts()): 
	?>

	<div class="content" id="response_objects">

		<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

			<?php get_template_part('parts/content', 'objects') ?>

		<?php endwhile; ?>

	</div>

<?php endif ?>

<?php get_template_part('parts/pagination') ?>

<?php wp_reset_query() ?>

<?php get_footer(); ?>