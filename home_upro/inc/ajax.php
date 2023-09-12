<?php 

$actions = [
	'filter_objects',
	'ajax_login',
	'add_object',
	'form_sold',
	'create_selection',
	'delete_object_from_selection',
	'delete_object_from_favourite',
	'delete_object',
	'delete_selection',
	'add_to_favourite',
	'add_object_to_selection',
	'edit_user_phone',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function filter_objects(){

	$args = array(
		'post_type' => 'objects',
		'posts_per_page' => -1,
            //'suppress_filters' => true,
	);

	$city_or_district = ($_GET['district'] || $_GET['city']) ? 
	array(
		'taxonomy' => 'city',
		'field' => 'id',
		'terms' => $_GET['district'] ?: $_GET['city'],
	) : 
	'';

	$object_type = $_GET['object_type'] ? array(
		'taxonomy' => 'object_type',
		'field' => 'id',
		'terms' => $_GET['object_type'],
	) : '';

	$street = $_GET['street'] ? array(
		'key' => 'street',
		'value' => $_GET['street'],
		'compare' => 'LIKE'
	) : '';

	$number_of_rooms = $_GET['number_of_rooms'] ? array(
		'taxonomy' => 'number_of_rooms',
		'field' => 'slug',
		'terms' => $_GET['number_of_rooms'],
	) : '';

	$area = ($_GET['area1'] || $_GET['area2']) ? array(
		'key' => 'total_area',
		'value' => array($_GET['area1'], $_GET['area2'] > 0 ? ($_GET['area2'] > $_GET['area1'] ? $_GET['area2'] : $_GET['area1']) : 1000000000000),
		'type'    => 'numeric',
		'compare' => 'BETWEEN'
	) : '';

	$type_area = $_GET['type_area'] ? array(
		'taxonomy' => 'area',
		'field' => 'id',
		'terms' => $_GET['type_area'],
	) : '';

	$condition = $_GET['condition'] ? array(
		'taxonomy' => 'condition',
		'field' => 'id',
		'terms' => $_GET['condition'],
	) : '';

	$price = ($_GET['price1'] || $_GET['price2']) ? array(
		'key' => 'price',
		'value' => array($_GET['price1'], $_GET['price2'] > 0 ? ($_GET['price2'] > $_GET['price1'] ? $_GET['price2'] : $_GET['price1']) : 1000000000000),
		'type'    => 'numeric',
		'compare' => 'BETWEEN'
	) : '';

	$mortgage = ($_GET['mortgage']) ? array(
		'key' => 'mortgage',
		'value' => $_GET['mortgage'],
	) : '';

	$builder = $_GET['builder'] ? array(
		'taxonomy' => 'builder',
		'field' => 'id',
		'terms' => $_GET['builder'],
	) : '';

	$residential_complex = $_GET['residential_complex'] ? array(
		'taxonomy' => 'residential_complex',
		'field' => 'id',
		'terms' => $_GET['residential_complex'],
	) : '';

	$turn = $_GET['turn'] ? array(
		'taxonomy' => 'turn',
		'field' => 'id',
		'terms' => $_GET['turn'],
	) : '';

	$section = $_GET['section'] ? array(
		'taxonomy' => 'section',
		'field' => 'id',
		'terms' => $_GET['section'],
	) : '';

	$features = $_GET['features'] ? array(
		'taxonomy' => 'features',
		'field' => 'id',
		'terms' => $_GET['features'],
	) : '';

	$args['tax_query'] = array(
		'relation' => 'AND',
		array('taxonomy' => 'sold', 'field' => 'id', 'terms' => '73', 'operator' => 'NOT IN'),
		$city_or_district,
		$object_type,
		$number_of_rooms,
		$type_area,
		$condition,
		$builder,
		$residential_complex,
		$turn,
		$section,
		$features,
	);

	$args['meta_query'] = array(
		$street,
		$area,
		$price,
		$mortgage,
	);
	
	$args['author'] = $_GET['author'] ?: '';

	if ($_GET['sort']) {
		switch ($_GET['sort']) {
			case 'price_min':
			$args['meta_key'] = 'price';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'ASC';
			break;
			case 'price_max':
			$args['meta_key'] = 'price';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
			case 'area_min':
			$args['meta_key'] = 'total_area';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'ASC';
			break;
			case 'area_max':
			$args['meta_key'] = 'total_area';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;

			default:
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			break;
		}
	}

	$query = new WP_Query($args);

	if( $query->have_posts() ) :
		while($query->have_posts() ): $query->the_post() ?>

			<?php get_template_part('parts/content', 'objects') ?>

		<?php endwhile;
		wp_reset_postdata();
	else :
		echo __('Objects not found', 'Home');
	endif;

	die();
}


function ajax_login(){

    // First check the nonce, if it fails the function will break
   // check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
	$email = $_POST['login'];
	$password = $_POST['password'];

	$auth = wp_authenticate($email, $password);

	if (is_wp_error($auth)) {
		$data = array(
			'update' => false,
			't' => $password,
			'status' => '<p class="error">' . __('Неправильні дані для входу', 'Home') . '</p>',
		);
	} else {

		wp_clear_auth_cookie();
		wp_set_current_user($auth->ID);
		wp_set_auth_cookie($auth->ID, true, false);
		update_user_caches( $auth );

		$data = array(
			'update' => true,
			'status' => '<p class="success">' . __('Будь ласка, зачекайте...', 'Home') . '</p>',
			'redirect' => get_permalink(94),
			'auth' => $auth
		);
	}

	if (empty($data))
		$data = array(
			'update' => false,
			'status' => '<p class="error">' . __('Невідома помилка', 'Home') . '</p>',
		);

	echo json_encode($data);

	wp_die();
}


function add_object(){
	debugger;

	$counter = wp_count_posts('objects')->publish + wp_count_posts('objects')->draft + 1;

	$post_data = array(
		'post_title'    => 'Object ' . $counter,
		'post_type'  => 'objects',
		'author' => $_POST['author_id'],
		'post_status'   => 'publish',
	);

	$post_id = wp_insert_post($post_data);

	$features = [];
	if($_POST['features']) $features = array_map('intval', $_POST['features']);

	if($_POST['object_type']) wp_set_object_terms($post_id, (int)($_POST['object_type']), 'object_type');
	if($_POST['internal_description']) update_field('internal_description', $_POST['internal_description'], $post_id);
	if($_POST['short_description']) update_field('short_description', $_POST['short_description'], $post_id);
	if($_POST['our_price']) update_field('our_price', $_POST['our_price'], $post_id);
	if($_POST['price']) update_field('price', $_POST['price'], $post_id);
	if($_POST['features']) wp_set_object_terms($post_id, $features, 'features');
	if($_POST['city']) wp_set_object_terms($post_id, (int)($_POST['city']), 'city');
	if($_POST['district']) wp_set_object_terms($post_id, (int)($_POST['district']), 'city', true);
	if($_POST['street']) update_field('street', $_POST['street'], $post_id);
	if($_POST['house_number']) update_field('house_number', $_POST['house_number'], $post_id);
	if($_POST['apartment_number']) update_field('apartment_number', $_POST['apartment_number'], $post_id);
	if($_POST['entrance']) update_field('entrance', $_POST['entrance'], $post_id);
	if($_POST['builder']) wp_set_object_terms($post_id, (int)($_POST['builder']), 'builder');
	if($_POST['residential_complex']) wp_set_object_terms($post_id, (int)($_POST['residential_complex']), 'residential_complex');
	if($_POST['turn']) wp_set_object_terms($post_id, (int)($_POST['turn']), 'turn');
	if($_POST['section']) wp_set_object_terms($post_id, (int)($_POST['section']), 'section');
	if($_POST['number_of_living_rooms']) update_field('number_of_living_rooms', $_POST['number_of_living_rooms'], $post_id);
	if($_POST['number_of_floors']) update_field('number_of_floors', $_POST['number_of_floors'], $post_id);
	if($_POST['residential_area']) update_field('residential_area', $_POST['residential_area'], $post_id);
	if($_POST['house_area']) update_field('house_area', $_POST['house_area'], $post_id);
	if($_POST['cadastral_number']) update_field('cadastral_number', $_POST['cadastral_number'], $post_id);
	if($_POST['unit_plot_area']) update_field('unit_plot_area', 'га', $post_id);
	if($_POST['plot_area']) update_field('plot_area', $_POST['plot_area'], $post_id);
	if($_POST['number_of_rooms']) update_field('number_of_rooms', $_POST['number_of_rooms'], $post_id);
	if($_POST['superficiality']) update_field('superficiality', $_POST['superficiality'], $post_id);
	if($_POST['over']) update_field('over', $_POST['over'], $post_id);
	if($_POST['total_area']) update_field('total_area', $_POST['total_area'], $post_id);
	if($_POST['mortgage']) update_field('mortgage', true, $post_id);
	if($_POST['owner_name']) update_field('owner_name', $_POST['owner_name'], $post_id);
	if($_POST['owner_phone']) update_field('owner_phone', $_POST['owner_phone'], $post_id);
	if($_POST['owner_phone_add']) update_field('owner_phone_add', $_POST['owner_phone_add'], $post_id);

	if($_POST['draft']) wp_update_post(['ID' => $_POST['object_id'], 'post_status' => 'draft']);

	echo get_permalink(55);

	die();
}


function form_sold(){

	if($_POST['selling_price']) update_field('selling_price', $_POST['selling_price'], $_POST['object_id']);
	if($_POST['commission_price']) update_field('commission_price', $_POST['commission_price'], $_POST['object_id']);
	if($_POST['buyer_name']) update_field('buyer_name', $_POST['buyer_name'], $_POST['object_id']);
	if($_POST['buyer_phone']) update_field('buyer_phone', $_POST['buyer_phone'], $_POST['object_id']);
	if($_POST['lead']) update_field('lead', $_POST['lead'], $_POST['object_id']);
	if($_POST['comment']) update_field('comment', $_POST['comment'], $_POST['object_id']);

	wp_set_object_terms($_POST['object_id'], 73, 'sold', true);

	/*if($_POST['draft']) wp_update_post(['ID' => $_POST['object_id'], 'post_status' => 'draft']);*/

	echo get_permalink(94);

	die();
}


function create_selection(){

	$counter = wp_count_posts('selection')->publish + 1;

	$post_data = array(
		'post_title'    => __('Підбір', 'Home') . ' ' . $counter,
		'post_type'  => 'selection',
		'author' => $_POST['author_id'],
		'post_status'   => 'publish',
	);

	$post_id = wp_insert_post($post_data);

	update_field('buyer_name', $_POST['buyer_name'], $post_id);
	update_field('buyer_phone', $_POST['buyer_phone'], $post_id);

	$objects = get_field('objects', $post_id, false);
	$objects[] = $_POST['object_id'];
	update_field('objects', $objects, $post_id);

	echo get_permalink($post_id);

	die();
}


function delete_object_from_selection(){

	$objects = get_field('objects', $_POST['selection_id'], false);
	unset($objects[array_search($_POST['object_id'], $objects)]);
	update_field('objects', $objects, $_POST['selection_id']);

	echo 'Success';

	die();
}


function delete_object_from_favourite(){

	$objects = get_field('favourite', 'user_' . $_POST['current_user_id'], false);
	unset($objects[array_search($_POST['object_id'], $objects)]);
	update_field('favourite', $objects, 'user_' . $_POST['current_user_id']);

	echo 'Success';

	die();
}


function delete_object(){

	wp_trash_post($_POST['object_id']);

	echo get_permalink(55);

	die();
}


function delete_selection(){

	wp_trash_post($_POST['selection_id']);

	echo 'Success';

	die();
}


function add_to_favourite(){

	if(!($objects = get_field('favourite', 'user_' . $_POST['current_user_id'], false))) $objects = [];

	if(in_array($_POST['object_id'], $objects)){
		unset($objects[array_search($_POST['object_id'], $objects)]);
	}
	else{
		$objects[] = $_POST['object_id'];
	}
	
	update_field('favourite', $objects, 'user_' . $_POST['current_user_id']);

	echo 'Success';

	die();
}


function add_object_to_selection(){

	if(!($objects = get_field('objects', $_POST['selection_id'], false))) $objects = [];

	if(in_array($_POST['object_id'], $objects)){
		unset($objects[array_search($_POST['object_id'], $objects)]);
	}
	else{
		$objects[] = $_POST['object_id'];
	}
	
	update_field('objects', $objects, $_POST['selection_id']);

	echo 'Success';

	die();
}


function edit_user_phone(){

	update_field('phone', $_POST['current_user_phone'], 'user_' . $_POST['current_user_id']);

	echo 'Success';

	die();
}