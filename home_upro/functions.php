<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-font', get_template_directory_uri() . '/css/font.css');
	wp_enqueue_style('my-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-nice-select', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-ui', get_template_directory_uri() . '/css/jquery-ui.min.css');
	wp_enqueue_style('my-swiper', get_template_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-dropzone', get_template_directory_uri() . '/css/dropzone.css');
	wp_enqueue_style('my-styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('my-style-main', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), false, true);
	wp_enqueue_script('my-swiper', get_template_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
	wp_enqueue_script('my-cuttr', get_template_directory_uri() . '/js/cuttr.js', array(), false, true);
	wp_enqueue_script('my-dropzone', get_template_directory_uri() . '/js/dropzone.js', array(), false, true);
	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
	wp_enqueue_script('my-add', get_template_directory_uri() . '/js/add.js', array(), false, true);

	$cities = get_terms(['taxonomy' => 'city', 'hide_empty' => false,]);

	$dataToBePassed = array(
		'cities' => $cities,
	);
	wp_localize_script('my-add', 'php_vars', $dataToBePassed);
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu'
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_action('wp_ajax_filter_objects', 'filter_objects');
add_action('wp_ajax_nopriv_filter_objects', 'filter_objects');
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