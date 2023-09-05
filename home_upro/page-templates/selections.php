<?php
/*
Template Name: Selections
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<?php 
	$author_id = get_current_user_id();
	$wp_query = new WP_Query(array('post_type' => 'selection', 'posts_per_page' => -1, 'author' => $author_id, 'paged' => get_query_var('paged')));
	if($wp_query->have_posts()): 
		?>
		<section class="home-block selection-inner">
			<div class="content-width">
				<?php get_template_part('parts/prev_page') ?>
				<div class="top-text">
					<h1><?= get_the_author_meta('first_name', $author_id) ?> <?= get_the_author_meta('last_name', $author_id) ?></h1>

					<?php if ($field = get_field('phone', 'user_' . $author_id)): ?>
						<p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
					<?php endif ?>
					
				</div>
				<div class="content">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<div class="item-photo">
							<div class="wrap">
								<h2><?php the_title() ?></h2>
								<p class="date"><?= get_the_date('d.m.Y') ?></p>
								<div class="btn-wrap">
									<a href="#" class="delete-item-photo"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11.svg" alt=""></a>
									<a href="<?php the_permalink() ?>" class="share"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12.svg" alt=""></a>
								</div>
							</div>

							<?php
							$featured_posts = get_field('objects');
							if($featured_posts): ?>

								<div class="wrap-photo">

									<?php foreach($featured_posts as $post): 

										global $post;
										setup_postdata($post); ?>
										<?php the_post_thumbnail('full') ?>
									<?php endforeach; ?>

									<?php wp_reset_postdata(); ?>

								</div>

							<?php endif; ?>

						<?php endwhile; ?>

					</div>
				</div>
			</section>

			<?php 
		endif;
		wp_reset_query(); 
		?>

	<?php endif ?>

	<?php get_footer(); ?>