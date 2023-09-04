<div class="item-home item-small">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>

	<div class="text-wrap">

		<?php if (is_singular('selection')): ?>
			<div class="del-item">
				<a href="#" class="del-item-small delete_object_from_selection" selection_id="<?= $args['selection_id'] ?>" object_id="<?= $args['object_id'] ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11.svg" alt=""></a>
			</div>
		<?php endif ?>

		<div class="cost">

			<?php if (get_field('price')): ?>
				<h6><?= number_format(get_field('price'), 0, '.', ' ') . ' ' . get_field('currency') ?></h6>
			<?php endif ?>

			<?php if (!is_singular('selection')): ?>
				<div class="btn">
					<a href="#" class="btn-info"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-6.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>

		<?php if (get_field('street') || get_field('house_number')): ?>
		<div class="address">
			<p><?= get_field('street') . ', ' .  get_field('house_number') ?></p>
		</div>
	<?php endif ?>

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
</div>
<?php if (!is_singular('selection')): ?>
	<div class="btn-active">
		<div class="send-block block-active">
			<div class="flex item-more">
				<a href="<?= get_permalink(116) . '?object_id=' . $args['id'] ?>" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-1.svg" alt=""><?php _e('Продано', 'Home') ?></a>
				<a href="#" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-2.svg" alt=""><?php _e('Приховати', 'Home') ?></a>
				<a href="#" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-3.svg" alt=""><?php _e('Редагувати', 'Home') ?></a>
				<a href="#" class="btn btn-default btn-red btn-del"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15.svg" alt=""><?php _e('Видалити', 'Home') ?></a>
				<a href="#" class="btn btn-default account-share"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""><?php _e('Надіслати', 'Home') ?></a>
				<a href="#" class="btn btn-default btn-create "><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""><?php _e('В підбір', 'Home') ?></a>
			</div>
			<div class="close-wrap">
				<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
			</div>
		</div>
		<div class="like-block block-active">
			<div class="flex flex-center item-center">
				<a href="#" class="btn btn-default btn-selection"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""><?php _e('В існуючий', 'Home') ?></a>
				<a href="#" class="btn btn-default btn-border btn-black"><?php _e('Створити новий', 'Home') ?></a>
			</div>

			<div class="close-wrap">
				<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
			</div>
		</div>
	</div>
<?php endif ?>

</div>