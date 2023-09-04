<?php
/*
Template Name: Sold Form
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in() && $_GET['object_id']): ?>

	<section class="home-block add-form">
		<div class="content-width">
			<div class="prev-page">
				<a href="#" onclick="history.back()" class="btn btn-border btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""><?php _e('Назад', 'Home') ?></a>
			</div>
			<div class="content-add">
				<h1><?php _e('Продано', 'Home') ?></h1>
				<div class="full-filter full-filter-page">
					<div class="full-filter-wrap">
						<form action="#" object_id="<?= $_GET['object_id'] ?>" class="form-filter" id="form_sold">
							<div class="input-wrap">
								<label for="selling_price"><?php _e('Ціна продажу', 'Home') ?><span>*</span></label>
								<input type="text" name="selling_price" id="selling_price" value="" required>
							</div>
							<div class="input-wrap">
								<label for="commission_price"><?php _e('Ціна комісійних', 'Home') ?><span>*</span></label>
								<input type="text" name="commission_price" id="commission_price" value="" required>
							</div>
							<div class="input-wrap ">
								<label for="buyer_name"><?php _e('ПІБ Покупця', 'Home') ?><span>*</span></label>
								<input type="text" name="buyer_name" id="buyer_name" value="" required>
							</div>

							<div class="input-wrap ">
								<label for="buyer_phone"><?php _e('Телефон покупця', 'Home') ?><span>*</span></label>
								<input type="text" name="buyer_phone" id="buyer_phone" value="" required class="tel">
							</div>

							<?php 
							$leads = get_field_object('field_64ef5afdbe155');
							$leads_choices = $leads['choices'];
							$leads_choices = array_values($leads_choices);
							?>

							<?php if ($leads_choices): ?>
								<div class="input-wrap input-wrap-popup input-wrap-img">
									<p class="label-info"><?php _e('Походженя ліда', 'Home') ?><span>*</span></p>

									<div class="nice-select">

										<?php foreach ($leads_choices as $index => $choice): ?>

											<?php if ($index == 0): ?>
												<span class="current"><?= $choice ?></span>
											<?php endif ?>
											
										<?php endforeach ?>
										
										<div class="list">
											<ul class="new">

												<?php foreach ($leads_choices as $index => $choice): ?>
													<li class="option<?php if($index == 0) echo ' selected focus' ?>">
														<label for="lead-<?= $index + 1 ?>"></label>
														<input type="radio" id="lead-<?= $index + 1 ?>" name="lead" value="<?= $choice ?>">
														<?= $choice ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>

								</div>
							<?php endif ?>

							<div class="input-wrap input-wrap-text">
								<label for="comment"><?php _e('Коментар', 'Home') ?><span>*</span></label>
								<textarea name="comment" id="comment" required></textarea>
							</div>
							<input type="hidden" name="draft">
							<div class="input-submit flex">
								<button type="submit" class="btn-default btn" id="form_sold_publish"><?php _e('Зберегти', 'Home') ?></button>
								<button type="submit" class="btn-default btn-border btn" id="form_sold_draft"><?php _e('В чернетки', 'Home') ?></button>
							</div>
							<input type="hidden" name="action" value="form_sold">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>

<?php get_footer(); ?>