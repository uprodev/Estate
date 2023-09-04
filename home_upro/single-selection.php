<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<?php $selection_id = get_the_ID() ?>

	<section class="home-block selection-inner sales-block selection-inner-2">
		<div class="content-width">
			<div class="prev-page">
				<a href="#" onclick="history.back()" class="btn btn-border btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""><?php _e('Назад', 'Home') ?></a>
			</div>
			<div class="flex">
				<div class="top-text">
					<h1><?php the_title() ?></h1>

					<?php if ($field = get_field('buyer_phone')): ?>
						<p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
					<?php endif ?>
					
					<div class="share-wrap">
						<a href="<?php the_permalink() ?>" class="share-link"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-13.svg" alt=""></a>
					</div>
				</div>
				<div class="share-info">
				</div>
			</div>

			<?php
			$featured_posts = get_field('objects');
			if($featured_posts): ?>

				<div class="content">

					<?php foreach($featured_posts as $post): 

						global $post;
						setup_postdata($post); ?>
						<?php get_template_part('parts/content', 'objects_small_edit', ['object_id' => get_the_ID(), 'selection_id' => $selection_id]) ?>
					<?php endforeach; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			<?php endif; ?>

		</div>
	</section>
<?php endif ?>

<?php get_footer(); ?>