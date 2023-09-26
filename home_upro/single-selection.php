<?php get_header(); ?>

<?php $selection_id = get_the_ID() ?>

<section class="home-block selection-inner sales-block selection-inner-2">
	<div class="content-width">
		<?php get_template_part('parts/prev_page') ?>
		<div class="flex">
			<div class="top-text">

				<?php if ($field = get_field('buyer_name')): ?>
					<h1><?= $field ?></h1>
				<?php endif ?>

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

<?php get_footer(); ?>