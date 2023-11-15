<div class="item-user item-share" selection_id="<?= $args['selection_id'] ?>">
	<div class="text">

		<?php if ($field = get_field('buyer_name')): ?>
			<h6><a href="<?= get_permalink(123) . '?object_id=' . $_GET['object_id'] . '&selection_id=' . $args['selection_id'] ?>"><?= $field ?></a></h6>
		<?php endif ?>
		
		<?php if ($field = get_field('buyer_phone')): ?>
			<p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
		<?php endif ?>
		
	</div>
</div>