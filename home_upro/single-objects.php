<?php get_header(); ?>

<div class="content">
	<div class="item-home">

		<div class="sliders-wrap">
			<figure class="wrap-item">

				<?php $author_id = $post->post_author ?>

				<?php if ($author_id): ?>
					<div class="author">
						<a href="<?= get_author_posts_url($author_id) ?>"><?= get_the_author_meta('last_name', $author_id) ?></a>
					</div>
				<?php endif ?>
				
				<div class="like-item">
					<a href="#">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/no-like.svg" alt="">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/like.svg" alt="" class="img-like">
					</a>
				</div>

				<ul class="tag">

					<?php $terms = wp_get_object_terms(get_the_ID(), 'object_type') ?>

					<?php if ($terms): ?>
						<?php foreach ($terms as $term): ?>
							<li>
								<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
							</li>
						<?php endforeach ?>
					<?php endif ?>

					<?php $terms = wp_get_object_terms(get_the_ID(), 'residential_complex') ?>

					<?php if ($terms): ?>
						<?php foreach ($terms as $term): ?>
							<li>
								<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
							</li>
						<?php endforeach ?>
					<?php endif ?>

					<?php $terms = wp_get_object_terms(get_the_ID(), 'builder') ?>

					<?php if ($terms): ?>
						<?php foreach ($terms as $term): ?>
							<li class="bg-black">
								<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
							</li>
						<?php endforeach ?>
					<?php endif ?>
					
				</ul>
			</figure>

			<?php $images = get_field('gallery');
			if($images): ?>

				<div class="swiper big-slider">
					<div class="swiper-wrapper">

						<?php foreach($images as $image): ?>

							<div class="swiper-slide">
								<a href="<?= $image['url'] ?>" data-fancybox="gallery">
									<?= wp_get_attachment_image($image['ID'], 'full') ?>
								</a>
							</div>

						<?php endforeach; ?>

					</div>
				</div>
				<div thumbsSlider="" class="swiper mini-slider">
					<div class="swiper-wrapper">

						<?php foreach($images as $image): ?>

							<div class="swiper-slide">
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							</div>

						<?php endforeach; ?>

					</div>
				</div>

			<?php endif; ?>

		</div>
		<div class="text-wrap">
			<div class="btn-active">
				<div class="send-block block-active">
					<div class="flex flex-center item-center">
						<a href="#" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt="">Надіслати</a>
						<a href="#" class="btn btn-default btn-create "><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt="">В підбір</a>
					</div>
					<div class="close-wrap">
						<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
					</div>
				</div>
				<div class="like-block block-active">
					<div class="flex flex-center item-center">
						<a href="#" class="btn btn-default">Створити новий</a>
						<a href="#" class="btn btn-default btn-selection"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""> В існуючий</a>
					</div>

					<div class="close-wrap">
						<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="cost">

				<?php if (get_field('price')): ?>
					<h6><?= number_format(get_field('price'), 0, '.', ' ') . ' ' . get_field('currency') ?></h6>
				<?php endif ?>
				
				<?php if (get_field('price') && get_field('total_area')): ?>
				<p><?= round(get_field('price') / get_field('total_area')) . ' ' . get_field('currency') . ' ' . __('за м²', 'Home') ?></p>
			<?php endif ?>
			
			<div class="btn-dot">
				<a href="" class="btn-send">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-6.svg" alt="">
				</a>
			</div>
		</div>
		<div class="info">
			<ul>

				<?php $terms = wp_get_object_terms(get_the_ID(), 'number_of_rooms') ?>

				<?php if ($terms): ?>
					<li>
						<div class="img-wrap">
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7-1.svg" alt="">
						</div>
						<p><?= $terms[0]->name . ' ' . __('кімнати', 'Home') ?></p>
					</li>
				<?php endif ?>
				
				<?php if (get_field('total_area') || get_field('living_area') || get_field('kitchen_area')): ?>
				<li>
					<div class="img-wrap">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7-2.svg" alt="">
					</div>
					<p><?= get_field('total_area') ?> / <?= get_field('living_area') ?> / <?= get_field('kitchen_area') . __('м²', 'Home') ?></p>
				</li>
			<?php endif ?>
			
			<?php if (get_field('superficiality') || get_field('over')): ?>
			<li>
				<div class="img-wrap">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7-3.svg" alt="">
				</div>
				<p><?= get_field('over') . ' ' .  __('з', 'Home') . ' ' . get_field('superficiality') ?></p>
			</li>
		<?php endif ?>

	</ul>
</div>

<?php if (get_field('street') || get_field('house_number')): ?>
<div class="address">
	<p><?= get_field('street') . ', ' .  get_field('house_number') ?></p>
</div>
<?php endif ?>

<?php $terms = wp_get_object_terms(get_the_ID(), 'tags_objects') ?>

<?php if ($terms): ?>

	<div class="tag-wrap">
		<ul class="tag-list">

			<?php foreach ($terms as $term): ?>
				<li>
					<a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
				</li>
			<?php endforeach ?>

		</ul>
	</div>

<?php endif ?>

<?php if ($content = get_the_content()): ?>
	<div class="text-info-full"><?= $content ?></div>
<?php endif ?>

<div class="owner">
	<a href="#" class="show-more"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-18.svg" alt=""><?php _e('Про власника', 'Home') ?></a>
	<div class="wrap">
		<p class="label"><?php _e('Власник нерухомості', 'Home') ?></p>

		<?php if ($author_id): ?>
			<p class="tel-wrap">
				<span class="name"><?= get_the_author_meta('last_name', $author_id) . ' ' . get_the_author_meta('first_name', $author_id) ?></span>

				<?php if ($field = get_field('phone_1', 'user_' . $author_id)): ?>
					<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a>
				<?php endif ?>

				<?php if ($field = get_field('phone_2', 'user_' . $author_id)): ?>
					<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a>
				<?php endif ?>

			</p>
		<?php endif ?>
		
		<?php if ($field = get_field('internal_description')): ?>
			<p class="h6"><?php _e('Внутрійшій опис', 'Home') ?></p>
			<?= $field ?>
		<?php endif ?>
		
	</div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>