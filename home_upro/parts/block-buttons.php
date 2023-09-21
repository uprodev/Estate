<div class="btn-active">
	<div class="send-block block-active" object_id="<?= $args['object_id'] ?>" current_user_id="<?= $args['current_user_id'] ?>">
		<div class="flex item-more">
			
			<?php if (get_post_field('post_author', $args['object_id']) == $args['current_user_id']): ?>

				<?php if (!$args['is_sold']): ?>
					<a href="<?= get_permalink(116) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-1.svg" alt=""><?php _e('Продано', 'Home') ?></a>
				<?php endif ?>
				
				<?php if (!$args['is_sold'] && !$args['is_draft']): ?>
					<a href="#" class="btn btn-default hide_object"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-2.svg" alt=""><?php _e('Приховати', 'Home') ?></a>
				<?php endif ?>
				
				<?php if (!$args['is_sold']): ?>
					<a href="<?= get_permalink(107) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-3.svg" alt=""><?php _e('Редагувати', 'Home') ?></a>
				<?php endif ?>
				
			<?php endif ?>
			
			<?php if (get_post_field('post_author', $args['object_id']) == $args['current_user_id'] || $args['is_favourite']): ?>
				<a href="#" class="btn btn-default btn-red btn-del <?= $args['is_favourite'] ? 'delete_object_from_favourite' : 'delete_object' ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15.svg" alt=""><?php _e('Видалити', 'Home') ?></a>
			<?php endif ?>
			
			<a href="<?php the_permalink() ?>" class="btn btn-default account-share"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""><?php _e('Надіслати', 'Home') ?></a>

			<?php if (!$args['is_sold']): ?>
				<a href="#" class="btn btn-default btn-create"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""><?php _e('В підбір', 'Home') ?></a>
			<?php endif ?>
			
		</div>
		<div class="close-wrap">
			<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
		</div>
	</div>

	<?php $selections = get_posts(array('post_type' => 'selection', 'posts_per_page' => -1, 'author' => $args['current_user_id'])) ?>

	<div class="like-block block-active">
		<div class="flex flex-center item-center">
			<a href="<?= get_permalink(125) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default"><?php _e('Створити новий', 'Home') ?></a>
			<a href="<?= get_permalink(123) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default<?php if(!$selections) echo ' disabled' ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""><?php _e('В існуючий', 'Home') ?></a>
		</div>
		<div class="close-wrap">
			<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
		</div>
	</div>
</div>