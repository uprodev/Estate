<?php
/*
Template Name: Selections
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<section class="home-block selection-inner">
		<div class="content-width">
			<div class="prev-page">
				<a href="#" onclick="history.back()" class="btn btn-border btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""><?php _e('Назад', 'Home') ?></a>
			</div>
			<div class="top-text">
				<h1>Тарас Бондаренко</h1>
				<p><a href="tel:+380999706649">+380999706649</a></p>
			</div>
			<div class="content">
				<div class="item-photo">
					<div class="wrap">
						<h2>Підбір 3</h2>
						<p class="date">21.06.2023</p>
						<div class="btn-wrap">
							<a href="#" class="delete-item-photo"><img src="img/icon-11.svg" alt=""></a>
							<a href="#11" class="share"><img src="img/icon-12.svg" alt=""></a>
						</div>
					</div>
					<div class="wrap-photo">
						<a href="img/img-5-1.jpg" data-fancybox="img"><img src="img/img-5-1.jpg" alt=""></a>
						<a href="img/img-5-2.jpg" data-fancybox="img"><img src="img/img-5-2.jpg" alt=""></a>
						<a href="img/img-5-3.jpg" data-fancybox="img"><img src="img/img-5-3.jpg" alt=""></a>
						<a href="img/img-5-4.jpg" data-fancybox="img"><img src="img/img-5-4.jpg" alt=""></a>
					</div>
				</div>
				<div class="item-photo">
					<div class="wrap">
						<h2>Підбір 2</h2>
						<p class="date">21.06.2023</p>
						<div class="btn-wrap">
							<a href="#" class="delete-item-photo"><img src="img/icon-11.svg" alt=""></a>
							<a href="#" class="share"><img src="img/icon-12.svg" alt=""></a>
						</div>
					</div>
					<div class="wrap-photo">
						<a href="img/img-5-2.jpg" data-fancybox="img"><img src="img/img-5-2.jpg" alt=""></a>
						<a href="img/img-5-3.jpg" data-fancybox="img"><img src="img/img-5-3.jpg" alt=""></a>
						<a href="img/img-5-4.jpg" data-fancybox="img"><img src="img/img-5-4.jpg" alt=""></a>
					</div>
				</div>
				<div class="item-photo">
					<div class="wrap">
						<h2>Підбір 1</h2>
						<p class="date">21.06.2023</p>
						<div class="btn-wrap">
							<a href="#" class="delete-item-photo"><img src="img/icon-11.svg" alt=""></a>
							<a href="#" class="share"><img src="img/icon-12.svg" alt=""></a>
						</div>
					</div>
					<div class="wrap-photo">
						<a href="img/img-5-3.jpg" data-fancybox="img"><img src="img/img-5-3.jpg" alt=""></a>
						<a href="img/img-5-4.jpg" data-fancybox="img"><img src="img/img-5-4.jpg" alt=""></a>
					</div>
				</div>
				<div class="item-photo">
					<div class="wrap">
						<h2>Підбір 0</h2>
						<p class="date">21.06.2023</p>
						<div class="btn-wrap">
							<a href="#" class="delete-item-photo"><img src="img/icon-11.svg" alt=""></a>
							<a href="#12345" class="share"><img src="img/icon-12.svg" alt=""></a>
						</div>
					</div>
					<div class="wrap-photo">
						<a href="img/img-5-3.jpg" data-fancybox="img"><img src="img/img-5-3.jpg" alt=""></a>
						<a href="img/img-5-4.jpg" data-fancybox="img"><img src="img/img-5-4.jpg" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>

<?php get_footer(); ?>