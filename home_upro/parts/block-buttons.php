<div class="btn-active">
	<div class="send-block block-active" object_id="<?= $args['object_id'] ?>">
		<div class="flex item-more">
			<a href="<?= get_permalink(116) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-1.svg" alt=""><?php _e('Продано', 'Home') ?></a>
			<a href="#" class="btn btn-default hide_object<?php if(is_singular('objects')) echo ' disabled' ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-2.svg" alt=""><?php _e('Приховати', 'Home') ?></a>
			<a href="<?= get_permalink(107) . '?object_id=' . $args['object_id'] ?>" class="btn btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-17-3.svg" alt=""><?php _e('Редагувати', 'Home') ?></a>
			<a href="#" class="btn btn-default btn-red btn-del delete_object"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15.svg" alt=""><?php _e('Видалити', 'Home') ?></a>
			<a href="<?php the_permalink() ?>" class="btn btn-default account-share"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""><?php _e('Надіслати', 'Home') ?></a>
			<a href="#" class="btn btn-default btn-create "><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt=""><?php _e('В підбір', 'Home') ?></a>
		</div>
		<div class="close-wrap">
			<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-black.svg" alt=""></a>
		</div>
	</div>

	<?php $selections = get_posts(array('post_type' => 'selection', 'posts_per_page' => -1, 'author' => $args['author_id'])) ?>

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