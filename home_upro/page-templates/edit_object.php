<?php
/*
Template Name: Edit Object
*/
?>

<?php get_header(); ?>

<section class="home-block add-form">
	<div class="content-width">

		<?php get_template_part('parts/prev_page') ?>
		
		<div class="content-add">
			<h1><?php the_title() ?></h1>
			<div class="full-filter full-filter-page">
				<div class="full-filter-wrap">
					<form action="#" class="form-filter">
						<div class="input-wrap input-wrap-popup input-wrap-img">
							<p class="label-info">Оберіть тип об’єкта<span>*</span></p>
							<div class="nice-select">
								<span class="current">Новобудови</span>
								<div class="list">
									<ul class="new">
										<li class="option selected focus"><label for="select-1-2-1"></label><input type="checkbox" id="select-1-2-1" name="select-1-2-1">
											<img src="img/icon-3-1.svg" alt="">Новобудови</li>
											<li class="option"><label for="select-1-2-2"></label><input type="checkbox" id="select-1-2-2" name="select-1-2-2"><img src="img/icon-3-1.svg" alt="">Вторинка</li>
											<li  class="option"><label for="select-1-2-3"></label><input type="checkbox" id="select-1-2-3" name="select-1-2-3"><img src="img/icon-3-2.svg" alt="">Будинки</li>
											<li  class="option"><label for="select-1-2-4"></label><input type="checkbox" id="select-1-2-4" name="select-1-2-4"><img src="img/icon-3-2.svg" alt="">Таунхауси</li>
											<li  class="option"><label for="select-1-2-5"></label><input type="checkbox" id="select-1-2-5" name="select-1-2-5"><img src="img/icon-3-3.svg" alt="">Апартаменти</li>
											<li  class="option"><label for="select-1-2-6"></label><input type="checkbox" id="select-1-2-6" name="select-1-2-6"><img src="img/icon-3-3.svg" alt="">Котеджі</li>
											<li  class="option"><label for="select-1-2-7"></label><input type="checkbox" id="select-1-2-7" name="select-1-2-7"><img src="img/icon-3-4.svg" alt="">Комерція</li>
											<li  class="option"><label for="select-1-2-8"></label><input type="checkbox" id="select-1-2-8" name="select-1-2-8"><img src="img/icon-3-5.svg" alt="">Земля</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-text">
								<label for="message-inner">Внутрішній опис<span>*</span></label>
								<textarea name="message-inner" id="message-inner" required></textarea>
								<p>Для внутрішнього використання</p>
							</div>

							<div class="input-wrap input-wrap-text">
								<label for="message-site">Короткий опис для сайту<span>*</span></label>
								<textarea name="message-site" id="message-site" minlength="250" required></textarea>
								<p>Мінімум 250 символів</p>
							</div>
							<div class="input-wrap">
								<label for="price-inner">Ціна наша<span>*</span></label>
								<input type="text" name="price-inner" id="price-inner" value="" required>
							</div>
							<div class="input-wrap">
								<label for="price-sell">Ціна на продаж<span>*</span></label>
								<input type="text" name="price-sell" id="price-sell" value="" required>
							</div>
							<div class="input-wrap-check input-wrap-check-more">
								<h6>Особливості</h6>
								<div class="wrap flex">
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-1">
										<label for="check-1-1">Ексклюзив</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-2">
										<label for="check-1-2">Усна домовленість</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-3">
										<label for="check-1-3">Партнерський продаж</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-4">
										<label for="check-1-4">Бартер</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-5">
										<label for="check-1-5">Ключі</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-1" id="check-1-6">
										<label for="check-1-6">Об'єкт з дошки оголошень</label>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Стан<span>*</span></p>
								<div class="nice-select">
									<span class="current">З ремонтом</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus"><label for="select-1-4-1"></label><input type="checkbox" id="select-1-4-1" name="select-1-4-1">З ремонтом</li>
											<li class="option"><label for="select-1-5-2"></label><input type="checkbox" id="select-1-5-2" name="select-1-5-2">Під ремонт</li>
											<li  class="option"><label for="select-1-5-3"></label><input type="checkbox" id="select-1-5-3" name="select-1-5-3">Після будівельників</li>


										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Оберіть місто<span>*</span></p>
								<div class="nice-select">
									<span class="current">Івано-Франківськ</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus"><label for="select-1-1-1"></label><input type="checkbox" id="select-1-1-1" name="select-1-1-1">Івано-Франківськ</li>
											<li class="option"><label for="select-1-1-2"></label><input type="checkbox" id="select-1-1-2" name="select-1-1-2">Кіїв</li>
											<li  class="option"><label for="select-1-1-3"></label><input type="checkbox" id="select-1-1-3" name="select-1-1-3">Дніпро</li>
											<li  class="option"><label for="select-1-1-4"></label><input type="checkbox" id="select-1-1-4" name="select-1-1-4">Карпати</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Район<span>*</span></p>
								<div class="nice-select">
									<span class="current">Район</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus"><label for="select-1-3-1"></label><input type="checkbox" id="select-1-3-1" name="select-1-3-1">Район 1</li>
											<li class="option"><label for="select-1-3-2"></label><input type="checkbox" id="select-1-3-2" name="select-1-3-2">Район 2</li>
											<li  class="option"><label for="select-1-3-3"></label><input type="checkbox" id="select-1-3-3" name="select-1-3-3">Район 3</li>
											<li  class="option"><label for="select-1-4-4"></label><input type="checkbox" id="select-1-4-4" name="select-1-4-4">Район 4</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-search input-wrap-popup">
								<label for="street-1-2">Вулиця<span>*</span></label>
								<input type="text" name="street-1-1" id="street-1-2" class="street">
								<p><img src="img/search.svg" alt=""></p>

							</div>
							<div class="input-wrap">
								<label for="home-number">Номер будинку<span>*</span></label>
								<input type="text" name="home-number" id="home-number" value="" required>
							</div>
							<div class="input-wrap">
								<label for="apartment-number">Номер квартири<span>*</span></label>
								<input type="text" name="apartment-number" id="apartment-number" value="" required>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Під’їзд<span>*</span></p>
								<div class="nice-select">
									<span class="current">1</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus"><label for="select-2-1-1"></label><input type="checkbox" id="select-2-1-1" name="select-2-1-1">1</li>
											<li class="option"><label for="select-2-1-2"></label><input type="checkbox" id="select-2-1-2" name="select-2-1-2">2</li>
											<li  class="option"><label for="select-2-1-3"></label><input type="checkbox" id="select-2-1-3" name="select-2-1-3">3</li>
											<li  class="option"><label for="select-2-1-4"></label><input type="checkbox" id="select-2-1-4" name="select-2-1-4">4</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Забудовник<span>*</span></p>
								<div class="nice-select">
									<span class="current">Оберіть забудовника</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus "><label for="select-1-6-1"></label><input type="checkbox" id="select-1-6-1" name="select-1-6-1">Cityconsult Development</li>
											<li class="option"><label for="select-1-6-2"></label><input type="checkbox" id="select-1-6-2" name="select-1-6-2">bUd development</li>
											<li  class="option"><label for="select-1-6-3"></label><input type="checkbox" id="select-1-6-3" name="select-1-6-3">BudCapital</li>
											<li  class="option"><label for="select-1-6-4"></label><input type="checkbox" id="select-1-6-4" name="select-1-6-4">Comfort Life Development</li>
											<li  class="option"><label for="select-1-6-5"></label><input type="checkbox" id="select-1-6-5" name="select-1-6-5">DIM</li>
											<li  class="option"><label for="select-1-6-6"></label><input type="checkbox" id="select-1-6-6" name="select-1-6-6">Edelburg Development</li>
											<li  class="option"><label for="select-1-6-7"></label><input type="checkbox" id="select-1-6-7" name="select-1-6-7">DIM</li>
											<li  class="option"><label for="select-1-6-8"></label><input type="checkbox" id="select-1-6-8" name="select-1-6-8">Edelburg Development</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Житловий комплекс<span>*</span></p>
								<div class="nice-select">
									<span class="current">Оберіть ЖК</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus "><label for="select-1-7-1"></label><input type="checkbox" id="select-1-7-1" name="select-1-7-1">ЖК 1</li>
											<li class="option"><label for="select-1-7-2"></label><input type="checkbox" id="select-1-7-2" name="select-1-7-2">ЖК 2</li>
											<li  class="option"><label for="select-1-7-3"></label><input type="checkbox" id="select-1-7-3" name="select-1-7-3">ЖК 3</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Черга<span>*</span></p>
								<div class="nice-select">
									<span class="current">1</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus "><label for="select-1-8-1"></label><input type="checkbox" id="select-1-8-1" name="select-1-8-1">1</li>
											<li class="option"><label for="select-1-8-2"></label><input type="checkbox" id="select-1-8-2" name="select-1-8-2">2</li>
											<li  class="option"><label for="select-1-8-3"></label><input type="checkbox" id="select-1-8-3" name="select-1-8-3">3</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-popup">
								<p class="label-info">Секція<span>*</span></p>
								<div class="nice-select">
									<span class="current">1</span>
									<div class="list">
										<ul class="new">
											<li class="option selected focus "><label for="select-1-9-1"></label><input type="checkbox" id="select-1-9-1" name="select-1-9-1">1</li>
											<li class="option"><label for="select-1-9-2"></label><input type="checkbox" id="select-1-9-2" name="select-1-9-2">2</li>
											<li  class="option"><label for="select-1-9-3"></label><input type="checkbox" id="select-1-9-3" name="select-1-9-3">3</li>

										</ul>
									</div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number">
								<label for="count">Кількість кімнат<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number">
								<label for="count-2">Поверховість<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count-2" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap input-wrap-number">
								<label for="count-3">Поверх<span>*</span></label>
								<div class="flex">
									<div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
									<input type="text" name="count" id="count-3" value="1" class="form-control"/>
									<div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
								</div>
							</div>
							<div class="input-wrap-check flex input-wrap-check-more ">
								<div class="wrap">
									<input type="checkbox" name="type-apartment" id="type-apartment-1">
									<label for="type-apartment-1">Пентхаус</label>
								</div>
								<div class="wrap">
									<input type="checkbox" name="type-apartment" id="type-apartment-2">
									<label for="type-apartment-2">Дворівнева</label>
								</div>
							</div>
							<div class="input-wrap ">
								<label for="apartment-area">Площа, м²<span>*</span></label>
								<input type="text" name="apartment-area" id="apartment-area" value="" required>
							</div>
							<div class="input-wrap-check flex input-wrap-check-more">
								<div class="wrap">
									<input type="checkbox" name="mortgage" id="mortgage">
									<label for="mortgage">Іпотека</label>
								</div>
							</div>
							<div class="input-wrap-check input-wrap-check-more">
								<h6>Додати теги</h6>
								<div class="wrap flex">
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-1">
										<label for="check-2-1">Ганий каєвид</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-2">
										<label for="check-2-2">Елітна квартира</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-3">
										<label for="check-2-3">Поруч із дитячим садочком</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-4">
										<label for="check-2-4">З меблями </label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-5">
										<label for="check-2-5">Терміново</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-6">
										<label for="check-2-6">Новий ремонт</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-7">
										<label for="check-2-7">Поруч зі школою</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-8">
										<label for="check-2-8">Кухня-студія</label>
									</div>
									<div class="item">
										<input type="checkbox" name="check-2" id="check-2-9">
										<label for="check-2-9">Біля річки</label>
									</div>
								</div>
							</div>
							<div class="input-wrap ">
								<label for="name-owner">Ім’я власника<span>*</span></label>
								<input type="text" name="name-owner" id="name-owner" value="" required>
							</div>
							<div class="input-wrap ">
								<label for="owner-tel">Номер телефону власника<span>*</span></label>
								<input type="text" name="owner-tel" id="owner-tel" value="" required class="tel">
							</div>
							<div class="input-wrap ">
								<label for="owner-tel-2">Додатковий номер телефону власника</label>
								<input type="text" name="owner-tel-2" id="owner-tel-2" value=""  class="tel">
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
								<button type="submit" class="btn-default btn-border btn">В чернетки</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>