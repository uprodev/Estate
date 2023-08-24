<?php get_header(); ?>

<div class="block-search-result">
	<div class="block-search-header border-top border-bottom">
		<div class="container-fluid">
			<a href="javascript:history.back()">
				<span class="icon">
					<img src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/ico-arrow-left.svg" alt="" />
				</span>
				<p><?php _e('Search results', 'RNB') ?>: <span><?= get_search_query() ?></span></p>
			</a>
		</div>
	</div>

	<?php if ( have_posts() ) : ?> 

		<div class="block-search-content">
			<div class="container-fluid">
				<div class="block-search-title"><?php _e('Services', 'RNB') ?></div>

				<div class="row">

					<?php 
					while ($wp_query->have_posts()): 
						$wp_query->the_post(); 
						?>

						<?php get_template_part('parts/content', 'search_result') ?>

					<?php endwhile ?>

				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="block-search-content block-search-content--empty">
			<p><?php _e('Not found', 'RNB') ?></p>
		</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>