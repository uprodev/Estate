<?php
/*
Template Name: Favourite
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<?php $author_id = get_current_user_id() ?>

	<section class="home-block sales-block chosen-block">
		<div class="content-width">

			<div class="tabs">
				<ul class="tabs-menu">
					<li><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-14-1.svg" alt=""><?php _e('Обране', 'Home') ?></li>
					<li><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-14-2.svg" alt=""><?php _e('Підбір', 'Home') ?></li>
				</ul>
				<div class="tab-content">

					<?php
					$featured_posts = get_field('favourite', 'user_' . $author_id);
					if($featured_posts): ?>

						<div class="content">

							<?php foreach($featured_posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<?php get_template_part('parts/content', 'objects_small_edit', ['object_id' => get_the_ID(), 'author_id' => $author_id]) ?>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>

					<?php endif; ?>

					<?php 
					$wp_query = new WP_Query(array('post_type' => 'selection', 'posts_per_page' => -1, 'author' => $author_id, 'paged' => get_query_var('paged')));
					if($wp_query->have_posts()): 
						?>

						<div class="user-content">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php get_template_part('parts/content', 'selection_favourite', ['selection_id' => get_the_ID()]) ?>

							<?php endwhile; ?>

						</div>

						<?php 
					endif;
					wp_reset_query(); 
					?>

				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php get_footer(); ?>