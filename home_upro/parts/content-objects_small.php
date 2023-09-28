<div class="item-home item-small">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>

	<div class="text-wrap">

		<?php if (get_field('price')): ?>
			<div class="cost">
				<h6><?= number_format(get_field('price'), 0, '.', ' ') . ' ' . get_field('currency') ?></h6>
			</div>
		<?php endif ?>

		<?php if (get_field('street') && get_field('house_number')): ?>
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

			<?php if (get_field('total_area') && get_field('living_area') && get_field('kitchen_area')): ?>
			<li>
				<div class="img-wrap">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7-2.svg" alt="">
				</div>
				<p><?= get_field('total_area') ?> / <?= get_field('living_area') ?> / <?= get_field('kitchen_area') . __('м²', 'Home') ?></p>
			</li>
		<?php endif ?>

		<?php if (get_field('superficiality') && get_field('over')): ?>
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
</div>