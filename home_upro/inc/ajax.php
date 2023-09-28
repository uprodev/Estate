<?php

$actions = [
	'filter_objects',
	'ajax_login',
	'add_object',
	'edit_object',
	'object_to_draft',
	'object_to_publish',
	'form_sold',
	'create_selection',
	'delete_object_from_selection',
	'delete_object_from_favourite',
	'delete_object',
	'delete_selection',
	'add_to_favourite',
	'add_object_to_selection',
	'edit_user_phone',
	'dropzonejs_upload',
	'delete_attachment',
	'cities_from_db',
	'cities_for_filter',

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

	$region = ($_GET['region_filter']) ?
	array(
		'taxonomy' => 'city',
		'field' => 'id',
		'terms' => $_GET['region_filter'],
	) :
	'';

	$city = ($_GET['city']) ?
	array(
		'taxonomy' => 'city',
		'field' => 'name',
		'terms' => $_GET['city'],
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

	$number_of_rooms = ($_GET['number_of_rooms'] && (int)$_GET['number_of_rooms'] > 0) ? array(
		'taxonomy' => 'number_of_rooms',
		'field' => 'slug',
		'terms' => $_GET['number_of_rooms'],
	) : '';

	$total_area = ($_GET['total_area_min'] || $_GET['total_area_max']) ? array(
		'key' => 'total_area',
		'value' => array($_GET['total_area_min'], $_GET['total_area_max'] > 0 ? ($_GET['total_area_max'] > $_GET['total_area_min'] ? $_GET['total_area_max'] : $_GET['total_area_min']) : 1000000000000),
		'type'    => 'numeric',
		'compare' => 'BETWEEN'
	) : '';

	$plot_area = ($_GET['plot_area_min'] || $_GET['plot_area_max']) ? array(
		'key' => 'total_area',
		'value' => array($_GET['plot_area_min'], $_GET['plot_area_max'] > 0 ? ($_GET['plot_area_max'] > $_GET['plot_area_min'] ? $_GET['plot_area_max'] : $_GET['plot_area_min']) : 1000000000000),
		'type'    => 'numeric',
		'compare' => 'BETWEEN'
	) : '';

	$superficiality = ($_GET['superficiality'] && (int)$_GET['superficiality'] > 0) ? array(
		'key' => 'superficiality',
		'value' => $_GET['superficiality'],
	) : '';

	$over = ($_GET['over'] && (int)$_GET['over'] > 0) ? array(
		'key' => 'over',
		'value' => $_GET['over'],
	) : '';

	$type_area = $_GET['type_area'] ? array(
		'taxonomy' => 'area',
		'field' => 'id',
		'terms' => $_GET['type_area'],
	) : '';

	$not_first = ($_GET['not_first']) ? array(
		'key' => 'over',
		'value' => 1,
		'type'    => 'numeric',
		'compare' => '!='
	) : '';

	$not_last = ($_GET['not_last']) ? array(
		'relation' => 'AND',
		'over.value' => [
			'key'     => 'over',
			'value'   => 0,
			'compare' => '!=',
			'type'    => 'NUMERIC',
		],
		[
			'key'     => 'superficiality',
			'compare' => '!=',
			'value'   => 'over.value',
			'type'    => 'NUMERIC',
		],
	) : '';

	$condition = $_GET['condition'] ? array(
		'taxonomy' => 'condition',
		'field' => 'id',
		'terms' => $_GET['condition'],
	) : '';

	$price = ($_GET['price_min'] || $_GET['price_max']) ? array(
		'key' => 'price',
		'value' => array($_GET['price_min'], $_GET['price_max'] > 0 ? ($_GET['price_max'] > $_GET['price_min'] ? $_GET['price_max'] : $_GET['price_min']) : 1000000000000),
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
		$region,
		$city,
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
		$total_area,
		$plot_area,
		$superficiality,
		$over,
		$not_first,
		$not_last,
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

	$counter = wp_count_posts('objects')->publish + wp_count_posts('objects')->draft + 1;

	$post_data = array(
		'post_title'    => 'Object ' . $counter,
		'post_type'  => 'objects',
		'author' => $_POST['author_id'],
		'post_status'   => 'publish',
	);

	$post_id = wp_insert_post($post_data);

	$features = [];
	if($_POST['features']){
		$features = array_map('intval', $_POST['features']);
		wp_set_object_terms($post_id, $features, 'features');
	}

	if($_POST['unit_plot_area']) update_field('unit_plot_area', 'га', $post_id);
	if($_POST['plot_area']) update_field($_POST['unit_plot_area'] ? 'plot_area_hectare' : 'plot_area', $_POST['plot_area'], $post_id);
	if($_POST['mortgage']) update_field('mortgage', true, $post_id);
	if($_POST['number_of_rooms']) wp_set_object_terms($post_id, $_POST['number_of_rooms'], 'number_of_rooms');

	foreach ($_POST as $key => $value) {
		if(str_contains($key, 'meta_')) update_field(mb_substr($key, 5), $_POST[$key], $post_id);
		if(str_contains($key, 'tax_')) wp_set_object_terms($post_id, (int)($_POST[$key]), mb_substr($key, 4));
	}

	if($_POST['district']) wp_set_object_terms($post_id, (int)($_POST['district']), 'city', true);

	if($_POST['region']) $regions = wp_set_object_terms($post_id, $_POST['region'], 'city');

	if($_POST['region'] && $_POST['city']){
		wp_insert_term($_POST['city'], 'city', array(
			'parent'      => $regions[0],
		));
		wp_set_object_terms($post_id, $_POST['city'], 'city', true);
	}

	if($_POST['images']){
		update_field('gallery', explode(',', $_POST['images']), $post_id);
		update_post_meta($post_id, '_thumbnail_id', explode(',', $_POST['images'])[0]);
	}

	if($_POST['short_description']) wp_update_post(['ID' => $post_id, 'post_content' => $_POST['short_description']]);
	if($_POST['draft']) wp_update_post(['ID' => $post_id, 'post_status' => 'draft']);

	echo get_permalink(55) . '?object_added=' . $post_id;

	die();
}


function edit_object(){

	$post_id = $_POST['object_id'];

	$features = [];
	if($_POST['features']){
		$features = array_map('intval', $_POST['features']);
		wp_set_object_terms($post_id, $features, 'features');
	}

	if($_POST['unit_plot_area']) update_field('unit_plot_area', 'га', $post_id);
	if($_POST['plot_area']) update_field($_POST['unit_plot_area'] ? 'plot_area_hectare' : 'plot_area', $_POST['plot_area'], $post_id);
	if($_POST['mortgage']) update_field('mortgage', true, $post_id);
	if($_POST['number_of_rooms']) wp_set_object_terms($post_id, $_POST['number_of_rooms'], 'number_of_rooms');

	foreach ($_POST as $key => $value) {
		if(str_contains($key, 'meta_')) update_field(mb_substr($key, 5), $_POST[$key], $post_id);
		if(str_contains($key, 'tax_')) wp_set_object_terms($post_id, (int)($_POST[$key]), mb_substr($key, 4));
	}

	if($_POST['district']) wp_set_object_terms($post_id, (int)($_POST['district']), 'city', true);

	if($_POST['region']) $regions = wp_set_object_terms($post_id, $_POST['region'], 'city');

	if($_POST['region'] && $_POST['city']){
		wp_insert_term($_POST['city'], 'city', array(
			'parent'      => $regions[0],
		));
		wp_set_object_terms($post_id, $_POST['city'], 'city', true);
	}

	if($_POST['images']){
		update_field('gallery', explode(',', $_POST['images']), $post_id);
		update_post_meta($post_id, '_thumbnail_id', explode(',', $_POST['images'])[0]);
	}

	if($_POST['short_description']) wp_update_post(['ID' => $post_id, 'post_content' => $_POST['short_description']]);
	if($_POST['draft']) wp_update_post(['ID' => $post_id, 'post_status' => 'draft']);

	echo get_permalink(55) . '?object_edited=' . $post_id;

	die();
}


function object_to_draft(){

	if($_POST['object_id']) wp_update_post(['ID' => $_POST['object_id'], 'post_status' => 'draft']);

	echo 'Success!';

	die();
}


function object_to_publish(){

	if($_POST['object_id']) wp_update_post(['ID' => $_POST['object_id'], 'post_status' => 'publish']);

	echo 'Success!';

	die();
}


function form_sold(){

	foreach ($_POST as $key => $value) {
		if(str_contains($key, 'meta_')) update_field(mb_substr($key, 5), $_POST[$key], $_POST['object_id']);
	}

	wp_set_object_terms($_POST['object_id'], 73, 'sold', true);

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

	foreach ($_POST as $key => $value) {
		if(str_contains($key, 'meta_')) update_field(mb_substr($key, 5), $_POST[$key], $post_id);
	}

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


function dropzonejs_upload() {
	if ( !empty($_FILES) ) {
		$files = $_FILES;
		foreach($files as $file) {
			$newfile = array (
				'name' => $file['name'],
				'type' => $file['type'],
				'tmp_name' => $file['tmp_name'],
				'error' => $file['error'],
				'size' => $file['size']
			);

			$_FILES = array('upload'=>$newfile);
			foreach($_FILES as $file => $array) {
				$newupload =  insert_attachment($file, $_REQUEST['user_id']);
			}
		}

		if ($user_id = $_REQUEST['user_id']) {
			update_field('avatar', $newupload, 'user_'.$user_id);
		}
	}
	die();
}

function insert_attachment($file_handler, $return = false) {
        // check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, 0 );

	if ($return)
		return $attach_id;

	echo intval($attach_id);
}


function delete_attachment() {
	if ($id = $_POST['id']) {
		wp_delete_attachment($id);
	}
}


function cities_from_db() {
	if ($_POST['region_id']) {
		$region_id = strval($_POST['region_id']);
		global $wpdb;
		$districts = $wpdb->get_results("SELECT id, name FROM level2 WHERE level1_id = $region_id");
		$cities = $wpdb->get_results("SELECT cities.id id, cities.name name, cities.level2_id district_id, districts.name district_name FROM level3 cities LEFT JOIN level2 districts ON cities.level2_id = districts.id WHERE cities.level1_id = $region_id");
		
		foreach ($cities as $key => $city) if ($city->district_name) $city->name = $city->name . ' (' . mb_strtoupper($city->district_name) . ')';
	}

	echo json_encode($cities);
}


function cities_for_filter() {
	if ($_POST['region_id']) {
		$cities = get_terms( [
			'taxonomy' => 'city',
			'parent' => (int)$_POST['region_id'],
		] );
	}

	echo json_encode($cities);
}