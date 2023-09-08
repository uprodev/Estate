<?php
/*
Template Name: Add Object
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>
	<section class="home-block add-form">
		<div class="content-width">

			<?php get_template_part('parts/prev_page') ?>

			<div class="content-add">
				<h1><?php the_title() ?></h1>
				<div class="full-filter full-filter-page page-add-form add-select-1">
					<div class="full-filter-wrap">
						<form action="#" class="form-filter" id="add_object">

							<?php 
							$terms = get_terms( [
								'taxonomy' => 'object_type',
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($terms): ?>
								<div class="input-wrap input-wrap-popup input-wrap-img input-wrap-all select-input-block-add">
									<p class="label-info"><?php _e('Оберіть тип об’єкта', 'Home') ?><span>*</span></p>
									<div class="nice-select">

										<?php foreach ($terms as $index => $term): ?>
											<?php if ($index == 0): ?>
												<span class="current"><?= $term->name ?></span>
											<?php endif ?>
										<?php endforeach ?>

										<div class="list">
											<ul class="new">

												<?php foreach ($terms as $index => $term): ?>
													<li class="option<?php if($index == 0) echo ' selected focus' ?>">
														<label for="object_type<?= $index + 1 ?>"></label>
														<input type="radio" id="object_type<?= $index + 1 ?>" name="object_type" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>

														<?php if ($field = get_field('icon', 'term_' . $term->term_id)): ?>
															<?= wp_get_attachment_image($field['ID'], 'full') ?>
														<?php endif ?>

														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<div class="input-wrap input-wrap-text input-wrap-all">
								<label for="internal_description"><?php _e('Внутрішній опис', 'Home') ?><span>*</span></label>
								<textarea name="internal_description" id="internal_description"></textarea>
								<p><?php _e('Для внутрішнього використання', 'Home') ?></p>
							</div>

							<div class="input-wrap input-wrap-text input-wrap-all">
								<label for="shotr_description"><?php _e('Короткий опис для сайту', 'Home') ?><span>*</span></label>
								<textarea name="shotr_description" id="shotr_description" minlength="250"></textarea>
								<p><?php _e('Мінімум 250 символів', 'Home') ?></p>
							</div>
							<div class="input-wrap input-wrap-all">
								<label for="our_price"><?php _e('Ціна наша', 'Home') ?><span>*</span></label>
								<input type="text" name="our_price" id="our_price">
							</div>
							<div class="input-wrap input-wrap-all">
								<label for="price"><?php _e('Ціна на продаж', 'Home') ?><span>*</span></label>
								<input type="text" name="price" id="price">
							</div>

							<?php 
							$terms = get_terms( [
								'taxonomy' => 'features',
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($terms): ?>
								<div class="input-wrap-check input-wrap-check-more input-wrap-all">
									<h6><?php _e('Особливості', 'Home') ?></h6>
									<div class="wrap flex">

										<?php foreach ($terms as $index => $term): ?>
											<div class="item">
												<input type="checkbox" name="features[]" id="features-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
												<label for="features-<?= $index + 1 ?>"><?= $term->name ?></label>
											</div>
										<?php endforeach ?>

									</div>
								</div>
							<?php endif ?>		

							<?php 
							$cities = get_terms( [
								'taxonomy' => 'city',
								'parent'  => 0,
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($cities): ?>
								<div class="input-wrap input-wrap-popup input-wrap-all">
									<p class="label-info"><?php _e('Оберіть місто', 'Home') ?><span>*</span></p>
									<div class="nice-select">

										<?php foreach ($cities as $index => $term): ?>
											<?php if ($index == 0): ?>
												<span class="current"><?= $term->name ?></span>
											<?php endif ?>
										<?php endforeach ?>

										<div class="list">
											<ul class="new">

												<?php foreach ($cities as $index => $term): ?>
													<li class="option<?php if($index == 0) echo ' selected focus' ?>">
														<label for="city<?= $index + 1 ?>"></label>
														<input type="radio" id="city<?= $index + 1 ?>" name="city" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							

							<?php 
							$districts = get_terms( [
								'taxonomy' => 'city',
								'parent'  => $cities[0]->term_id,
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($cities && $districts): ?>
								<div class="input-wrap input-wrap-popup input-wrap-all">
									<p class="label-info"><?php _e('Район', 'Home') ?><span>*</span></p>
									<div class="nice-select">
										<span class="current" id="current_district"><?php _e('Район', 'Home') ?></span>
										<div class="list">
											<ul class="new not_all" id="districts">
												
												<?php foreach ($districts as $index => $term): ?>
													<li class="option">
														<label for="select-3-<?= $index + 1 ?>"></label>
														<input type="radio" id="select-3-<?= $index + 1 ?>" name="district" value="<?= $term->term_id ?>">
														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>

							<div class="input-wrap input-wrap-search input-wrap-popup input-wrap-all">
								<label for="street"><?php _e('Вулиця', 'Home') ?><span>*</span></label>
								<input type="text" name="street" id="street" class="street">
								<p><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></p>

							</div>
							<div class="input-wrap input-wrap-all">
								<label for="house_number"><?php _e('Номер будинку', 'Home') ?><span>*</span></label>
								<input type="text" name="house_number" id="house_number">
							</div>


							<!--тут буде розділ на 5 веток-->

							<div class="input-wrap input-wrap-var-1 input-wrap-var-2 ">
								<label for="apartment_number"><?php _e('Номер квартири', 'Home') ?><span>*</span></label>
								<input type="text" name="apartment_number" id="apartment_number">
							</div>

							<?php $entrances = get_field_object('field_64e37150994d6')['choices'] ?>

							<?php if ($entrances): ?>
								<div class="input-wrap input-wrap-popup input-wrap-var-1 input-wrap-var-2">
									<p class="label-info"><?php _e('Під’їзд', 'Home') ?><span>*</span></p>
									<div class="nice-select">

										<?php foreach ($entrances as $index => $entrance): ?>
											<?php if ($index == 1): ?>
												<span class="current"><?= $entrance ?></span>
											<?php endif ?>
										<?php endforeach ?>

										<div class="list">
											<ul class="new">

												<?php foreach ($entrances as $index => $entrance): ?>
													<li class="option<?php if($index == 1) echo ' selected focus' ?>">
														<label for="entrance-<?= $index + 1 ?>"></label>
														<input type="radio" id="entrance-<?= $index + 1 ?>" name="entrance" value="<?= $term->term_id ?>"<?php if($index == 1) echo ' checked' ?>>
														<?= $entrance ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<?php 
							$terms = get_terms( [
								'taxonomy' => 'builder',
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($terms): ?>
								<div class="input-wrap input-wrap-popup input-wrap-var-1 input-wrap-var-4 ">
									<p class="label-info"><?php _e('Забудовник', 'Home') ?><span>*</span></p>
									<div class="nice-select">
										<span class="current"><?php _e('Оберіть забудовника', 'Home') ?></span>
										<div class="list">
											<ul class="new">

												<?php foreach ($terms as $index => $term): ?>
													<li class="option">
														<label for="builder-<?= $index + 1 ?>"></label>
														<input type="radio" id="builder-<?= $index + 1 ?>" name="builder" value="<?= $term->term_id ?>">
														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<?php 
							$terms = get_terms( [
								'taxonomy' => 'residential_complex',
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($terms): ?>
								<div class="input-wrap input-wrap-popup input-wrap-var-1 input-wrap-var-4">
									<p class="label-info"><?php _e('Житловий комплекс', 'Home') ?><span>*</span></p>
									<div class="nice-select">
										<span class="current"><?php _e('Оберіть ЖК', 'Home') ?></span>
										<div class="list">
											<ul class="new">

												<?php foreach ($terms as $index => $term): ?>
													<li class="option">
														<label for="residential_complex-<?= $index + 1 ?>"></label>
														<input type="radio" id="residential_complex-<?= $index + 1 ?>" name="residential_complex" value="<?= $term->term_id ?>">
														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<?php 
							$terms = get_terms( [
								'taxonomy' => 'turn',
								'hide_empty' => false,
							] ) 
							?>

							<?php if ($terms): ?>
								<div class="input-wrap input-wrap-popup input-wrap-var-1 input-wrap-var-4">
									<p class="label-info"><?php _e('Черга', 'Home') ?><span>*</span></p>
									<div class="nice-select">

										<?php foreach ($terms as $index => $term): ?>
											<?php if ($index == 0): ?>
												<span class="current"><?= $term->name ?></span>
											<?php endif ?>
										<?php endforeach ?>

										<div class="list">
											<ul class="new">

												<?php foreach ($terms as $index => $term): ?>
													<li class="option<?php if($index == 0) echo ' selected focus' ?>">
														<label for="turn-<?= $index + 1 ?>"></label>
														<input type="radio" id="turn-<?= $index + 1 ?>" name="turn" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
														<?= $term->name ?>
													</li>
												<?php endforeach ?>

											</ul>
										</div>
									</div>
								</div>
							<?php endif ?>
							
							<?php 
							$terms = get_terms( [
								'taxonomy' => 'section',
								'hide_empty' => false,
							] ) 
							?>

							<div class="input-wrap input-wrap-popup input-wrap-var-1 input-wrap-var-4">
								<p class="label-info"><?php _e('Секція', 'Home') ?><span>*</span></p>
								<div class="nice-select">
									
									<?php foreach ($terms as $index => $term): ?>
										<?php if ($index == 0): ?>
											<span class="current"><?= $term->name ?></span>
										<?php endif ?>
									<?php endforeach ?>

									<div class="list">
										<ul class="new">

											<?php foreach ($terms as $index => $term): ?>
												<li class="option<?php if($index == 0) echo ' selected focus' ?>">
													<label for="section<?= $index + 1 ?>"></label>
													<input type="radio" id="section<?= $index + 1 ?>" name="section" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
													<?= $term->name ?>
												</li>
											<?php endforeach ?>

										</ul>
									</div>
								</div>
							</div>

							<!--3-->

							<div class="input-wrap input-wrap-number input-wrap-var-3 input-wrap-var-4">
								<label for="number_of_living_rooms"><?php _e('Кількість житлових кімнат', 'Home') ?></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="<?= get_stylesheet_directory_uri() ?>/img/minus.svg" alt=""></div>
									<input type="number" name="number_of_living_rooms" id="number_of_living_rooms" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="<?= get_stylesheet_directory_uri() ?>/img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number input-wrap-var-3 input-wrap-var-4">
								<label for="number_of_floors"><?php _e('Кількість поверхів', 'Home') ?></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="<?= get_stylesheet_directory_uri() ?>/img/minus.svg" alt=""></div>
									<input type="number" name="number_of_floors" id="number_of_floors" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="<?= get_stylesheet_directory_uri() ?>/img/plus.svg" alt=""></div>
								</div>
							</div>

							<div class="input-wrap  input-wrap-var-3 input-wrap-var-4">
								<label for="residential_area"><?php _e('Площа житлова', 'Home') ?> , <?php _e('м²', 'Home') ?></label>
								<input type="number" name="residential_area" id="residential_area">
							</div>

							<div class="input-wrap i input-wrap-var-3 input-wrap-var-4">
								<label for="house_area"><?php _e('Площа будинку', 'Home') ?> , <?php _e('м²', 'Home') ?></label>
								<input type="number" name="house_area" id="house_area">
							</div>

							<!--5-->
							<div class="input-wrap i input-wrap-var-5">
								<label for="cadastral_number"><?php _e('Кадастровий номер', 'Home') ?></label>
								<input type="text" name="cadastral_number" id="cadastral_number">
							</div>

							<div class="input-wrap  input-wrap-var-3 mini-radio-input input-wrap-var-4 input-wrap-var-5">
								<div class="mini-radio">
									<input type="checkbox" name="unit_plot_area" id="unit_plot_area">
									<label for="unit_plot_area"><?php _e('га', 'Home') ?></label>
								</div>
								<label for="plot_area"><?php _e('Площая ділянки, сотки', 'Home') ?></label>
								<input type="number" name="plot_area" id="plot_area">
							</div>

							<!--3 кінец-->

							<div class="input-wrap input-wrap-number input-wrap-var-1 input-wrap-var-2">
								<label for="count1">Кількість кімнат<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count1" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number input-wrap-var-1 input-wrap-var-2">
								<label for="count-2">Поверховість<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count-2" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number input-wrap-var-1 input-wrap-var-2">
								<label for="count-3">Поверх<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count-3" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-var-1 input-wrap-var-2">
								<label for="apartment-area">Площа, м²<span>*</span></label>
								<input type="text" name="apartment-area" id="apartment-area">
							</div>
							<div class="input-wrap-check flex input-wrap-var-1 input-wrap-var-2 input-wrap-var-3">
								<div class="wrap">
									<input type="checkbox" name="mortgage" id="mortgage1">
									<label for="mortgage1">Іпотека</label>
								</div>
							</div>

							<!--2 - все шо в 1 тільки меньше полей-->




							<div class="input-wrap input-wrap-all">
								<label for="name-owner">Ім’я власника<span>*</span></label>
								<input type="text" name="name-owner" id="name-owner">
							</div>
							<div class="input-wrap input-wrap-all">
								<label for="owner-tel">Номер телефону власника<span>*</span></label>
								<input type="text" name="owner-tel" id="owner-tel" class="tel">
							</div>
							<div class="input-wrap input-wrap-all">
								<label for="owner-tel-2">Додатковий номер телефону власника</label>
								<input type="text" name="owner-tel-2" id="owner-tel-2"  class="tel">
							</div>

							<div class="input-wrap-dropzone dropzone">
								<div id="dZUpload" class="">
									<div class="dz-default dz-message">
										<div class="wrap-dropzone">
											<figure>
												<img src="img/icon-10.svg" alt="">
											</figure>
										</div>
									</div>
								</div>
							</div>
							<div class="input-submit flex">
								<button type="submit" class="btn-default btn">Зберегти</button>
								<a href="#" class="btn-default btn-border btn">В чернетки</a>
							</div>
							<input type="hidden" name="action" value="add_object">
						</form>

						<script>
							jQuery(document).ready(function($) { 
								$("#add_object").validate();
							})
						</script>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php get_footer(); ?>