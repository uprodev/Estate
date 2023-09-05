<?php
/*
Template Name: Account
*/
?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

	<?php $author_id = get_current_user_id() ?>

	<section class="home-block sales-block account-block">
		<div class="content-width">
			<div class="top-info">
				<h1 class="title"><?php the_title() ?></h1>
				<div class="login-wrap">
					<a href="<?= wp_logout_url(home_url()) ?>">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-8.svg" alt="">
						<span>log out</span>
					</a>
				</div>
			</div>
			<form action="#">
				<div class="account">
					<div class="img-wrap">
						<figure class="user-photo">
							<img src="<?= get_stylesheet_directory_uri() ?>/img/img-6.jpg" alt="">
						</figure>
						<div class=" dropzone">
							<div id="dZUpload" class="">
								<div class="dz-default dz-message">
									<div class="wrap-dropzone">
										<figure>
											<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-10.svg" alt="">
										</figure>
									</div>
								</div>
							</div>
						</div>
						<div class="btn-edit-img btn-edit">
							<a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-16.svg" alt=""></a>
						</div>
					</div>
					<div class="text-wrap">
						<p class="name"><?= get_the_author_meta('display_name', $author_id) ?></p>

						<?php if ($field = get_field('phone', 'user_' . $author_id)): ?>
							<div class="input-wrap">
								<label for="user-tel"></label>
								<input type="text" name="user-tel" id="user-tel" class="tel" disabled value="<?= $field ?>">
								<a href="#" class="btn-edit-tel"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-16.svg" alt=""></a>
							</div>
						<?php endif ?>
						
					</div>
				</div>
			</form>
			<div class="tabs">
				<ul class="tabs-menu">
					<li><?php _e('Мої об’єкти', 'Home') ?></li>
					<li><?php _e('Чернетки', 'Home') ?></li>
				</ul>
				<div class="tab-content">

					<?php 
					$wp_query = new WP_Query(array('post_type' => 'objects', 'posts_per_page' => -1, 'author' => $author_id, 'tax_query' => array(array('taxonomy' => 'sold', 'field' => 'id', 'terms' => '73', 'operator' => 'NOT IN')), 'paged' => get_query_var('paged')));
					if($wp_query->have_posts()): 
						?>

						<div class="content content-account">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php get_template_part('parts/content', 'objects_small_edit', ['object_id' => get_the_ID(), 'author_id' => get_post_field('post_author', get_the_ID())]) ?>

							<?php endwhile; ?>

						</div>

						<?php 
					endif;
					wp_reset_query(); 
					?>

					<?php 
					$wp_query = new WP_Query(array('post_type' => 'objects', 'post_status' => 'draft', 'posts_per_page' => -1, 'author' => $author_id, 'tax_query' => array(array('taxonomy' => 'sold', 'field' => 'id', 'terms' => '73', 'operator' => 'NOT IN')), 'paged' => get_query_var('paged')));
					if($wp_query->have_posts()): 
						?>

						<div class="content">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

								<?php get_template_part('parts/content', 'objects_small_edit_draft') ?>

							<?php endwhile; ?>

						</div>

						<?php 
					endif;
					wp_reset_query(); 
					?>

				</div>
			</div>

		</div>
	</section>

<?php endif ?>

<?php get_footer(); ?>