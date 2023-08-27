<div class="item-home">
	<figure>

		<?php $author_id = $post->post_author ?>

		<?php if ($author_id): ?>
			<div class="author">
				<a href="<?= get_author_posts_url($author_id) ?>"><?= get_the_author_meta('last_name', $author_id) ?></a>
			</div>
		<?php endif ?>

		<div class="like-item is-like">
			<a href="#">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/no-like.svg" alt="">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/like.svg" alt="" class="img-like">
			</a>
		</div>

		<?php if (has_post_thumbnail()): ?>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		<?php endif ?>
		
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
	<div class="text-info"><?= $content ?></div>
<?php endif ?>

</div>
</div>