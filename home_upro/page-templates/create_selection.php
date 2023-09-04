<?php
/*
Template Name: Create Selection
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<div class="create-wrap">
		<h2><?php the_title() ?></h2>
		<form action="#" class="form-filter" id="form_create_selection">
			<div class="input-wrap ">
				<label for="buyer_name"><?php _e('ПІБ покупця', 'Home') ?><span>*</span></label>
				<input type="text" name="buyer_name" id="buyer_name" value="">
			</div>
			<div class="input-wrap ">
				<label for="buyer_phone"><?php _e('Телефон покупця', 'Home') ?><span>*</span></label>
				<input type="text" name="buyer_phone" id="buyer_phone" value="" class="tel">
			</div>
			<div class="btn-submit">
				<button type="submit" class="btn btn-default"><?php _e('Зберегти', 'Home') ?></button>
				<button type="reset" class="btn btn-default btn-border"><?php _e('Зкинути', 'Home') ?></button>
			</div>
			<input type="hidden" name="object_id" value="<?= $_GET['object_id'] ?>">
			<input type="hidden" name="author_id" value="<?= get_current_user_id() ?>">
			<input type="hidden" name="action" value="create_selection">
		</form>
	</div>

<?php endif ?>

<?php get_footer(); ?>