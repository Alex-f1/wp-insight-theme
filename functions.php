<?php
/**
 * insight functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package insight
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Подключение Carbon Fields
require get_template_directory() . '/inc/carbon-fields.php';

// Подключение Carbon Fields Blocks
require get_template_directory() . '/inc/carbon-fields-blocks.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function insight_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on insight, use a find and replace
		* to change 'insight' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'insight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Основное меню', 'insight' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'insight_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'insight_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function insight_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'insight_content_width', 640 );
}
add_action( 'after_setup_theme', 'insight_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function insight_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_register_style( 
		'app', 
		get_theme_file_uri( '/assets/css/app.css' ), 
		array(), 
		'1.0.0' 
	);

	wp_register_style( 
		'dev', 
		get_theme_file_uri( '/assets/css/dev.css' ), 
		array(), 
		'1.0.0' 
	);

	/* wp_register_style( 
		'plugins', 
		get_theme_file_uri( '/assets/css/plugins.min.css' ), 
		array(), 
		'1.0.0' 
	); */
	
	wp_register_style( 
		'swiper', 
		get_theme_file_uri( '/assets/css/swiper.min.css' ), 
		array(), 
		'8.0.3' 
	);

	wp_enqueue_style( 'app' );
	// wp_enqueue_style( 'plugins' );
	wp_enqueue_style( 'swiper' );
	wp_enqueue_style( 'dev' );

	wp_deregister_script( 'jquery' );


	wp_register_script( 
		'jquery', 
		get_theme_file_uri( '/assets/js/vendors/jquery-3.6.0.min.js' ), 
		array(), 
		'3.6.0', 
		true 
	);

	wp_register_script( 
		'rellax', 
		get_theme_file_uri( '/assets/js/vendors/rellax-1.12.1.min.js' ),
		array(),
		'1.12.1', 
		true 
	);

	wp_register_script( 
		'smoothscroll_polyfill', 
		get_theme_file_uri( '/assets/js/vendors/smoothscroll.polyfill-0.4.4.js' ), 
		array(), 
		'0.4.4', 
		true 
	);

	/* wp_register_script( 
		'plugins', 
		get_theme_file_uri( '/assets/js/plugins.min.js' ), 
		array( 
			'jquery' 
		), 
		'1.0.0', true 
	); */

	wp_register_script( 
		'swiper', 
		get_theme_file_uri( '/assets/js/swiper-bundle.min.js' ), 
		array(), 
		'8.0.3', true 
	);

	wp_register_script( 
		'viewportChecker', 
		get_theme_file_uri( '/assets/js/viewportChecker.js' ), 
		array( 
			'jquery' 
		), 
		'1.0.0', true 
	);

	wp_register_script( 
		'app', 
		get_theme_file_uri( '/assets/js/app.js' ), 
		array( 
			'jquery' , 
			// 'plugins',
			'rellax',
			'smoothscroll_polyfill',
			'swiper',
			'viewportChecker',
		), 
		'1.0.0', 
		true 
	);

	wp_enqueue_script( 'app' );
}
add_action( 'wp_enqueue_scripts', 'insight_scripts' );

/**
 * Очистка номер телефона от всего кроме цифр
 *
 * @param string|number исходный номер телефона
 *
 * @return string очищенный номер телефон с + в начале
 */

function make_phone_url( $phone ) {
	return esc_attr( '+' . preg_replace('/\D/', '', $phone ) );
}

/**
 * Удаляем префикс "Рубрика:", "Метка:" и т.п. из заголовка страницы архива
 */
function sg_remove_archive_title_prefix( $archive_title ) {
	return preg_replace( '~^[^:]+: ~', '', $archive_title );
}
add_filter( 'get_the_archive_title', 'sg_remove_archive_title_prefix' );

/**
 * Удаление тегов "<p>, <br>" у плагина Contact Form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

function register_post_types() {

	register_post_type('countries', array(
		'labels' => array(
			'name' => esc_html__('Страны', 'insight'),
			'singular_name' => 'Страна',
			'all_items' => 'Все страны',
			'add_new' => 'Добавить новую',
			'add_new_item' => 'Добавить новую страну',
		),
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => null,
		'show_in_menu' => true, // показывать ли в меню админ панели
		'show_in_admin_bar' => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus' => true,
		'show_in_rest' => true, // добавить в REST API. C WP 4.7
		'rest_base' => null, // $post_type. C WP 4.7
		'menu_position' => 5,
		'menu_icon' => 'dashicons-location',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
		'taxonomies' => array('category'),
		'has_archive' => true,
		'rewrite' => array(
			'slug' => 'countries',
			'with_front' => false
		),
		'query_var' => true,
	));

	register_post_type('location', array(
		'labels' => array(
			'name' => __('Направления'),
			'singular_name' => 'Направление',
			'all_items' => 'Все направления',
			'add_new' => 'Добавить новое',
			'add_new_item' => 'Добавить новое направление',
		),
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => null,
		'show_in_menu' => true, // показывать ли в меню админ панели
		'show_in_admin_bar' => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus' => true,
		'show_in_rest' => true, // добавить в REST API. C WP 4.7
		'rest_base' => null, // $post_type. C WP 4.7
		'menu_position' => 6,
		'menu_icon' => 'dashicons-location-alt',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
		'taxonomies' => array(),
		'has_archive' => false,
		'rewrite' => array(),
		'query_var' => true,
	));

	register_post_type('services', array(
		'labels' => array(
			'name' => 'Услуги',
			'singular_name' => 'Услуга',
			'all_items' => 'Все услуги',
			'add_new' => 'Добавить новую',
			'add_new_item' => 'Добавить новую услугу',
		),
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => null,
		'show_in_menu' => true, // показывать ли в меню админки
		'show_in_admin_bar' => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus' => true,
		'show_in_rest' => true, // добавить в REST API. C WP 4.7
		'rest_base' => null, // $post_type. C WP 4.7
		'menu_position' => 6,
		'menu_icon' => 'dashicons-products',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
		'taxonomies' => array('service', 'dubai', 'entertainment'),
		'has_archive' => false,
		'rewrite' => array(
			'slug' => 'services',
			'with_front' => false
		),
		'query_var' => true,
	));

	## Общие
	### Таксономии. Услуги
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('service', array('services'), array(
		'label' => '', // определяется параметром $labels->name
		'labels' => array(
			'name' => 'Общие услуги',
			'singular_name' => 'Общая услуга',
			'search_items' => 'Поиск',
			'all_items' => 'Все общие услуги',
			'view_item ' => 'Просмотр раздела',
			'parent_item' => 'Родительский раздел',
			'parent_item_colon' => 'Родительский раздел:',
			'edit_item' => 'Редактировать',
			'update_item' => 'Обновить',
			'add_new_item' => 'Добавить',
			'new_item_name' => 'Название',
			'menu_name' => 'Общие услуги',
		),
		'description' => '', // описание таксономии
		'public' => true,
		'publicly_queryable' => null, // равен аргументу public
		'show_in_nav_menus' => true, // равен аргументу public
		'show_ui' => true, // равен аргументу public
		'show_in_menu' => true, // равен аргументу show_ui
		'show_tagcloud' => true, // равен аргументу show_ui
		'show_in_rest' => null, // добавить в REST API
		'rest_base' => null, // $taxonomy
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true, //'query_var' => $taxonomy, // название параметра запроса
		'capabilities' => array(),
		'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column' => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin' => false,
		'show_in_quick_edit' => null, // по умолчанию значение show_ui
	));
	## Дубай
	### Таксономии. Услуги
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('dubai', array('services'), array(
		'label' => '', // определяется параметром $labels->name
		'labels' => array(
			'name' => 'Дубай',
			'singular_name' => 'Дубай услуга',
			'search_items' => 'Поиск',
			'all_items' => 'Все услуги Дубая',
			'view_item ' => 'Просмотр раздела',
			'parent_item' => 'Родительский раздел',
			'parent_item_colon' => 'Родительский раздел:',
			'edit_item' => 'Редактировать',
			'update_item' => 'Обновить',
			'add_new_item' => 'Добавить',
			'new_item_name' => 'Название',
			'menu_name' => 'Дубай',
		),
		'description' => '', // описание таксономии
		'public' => true,
		'publicly_queryable' => null, // равен аргументу public
		'show_in_nav_menus' => true, // равен аргументу public
		'show_ui' => true, // равен аргументу public
		'show_in_menu' => true, // равен аргументу show_ui
		'show_tagcloud' => true, // равен аргументу show_ui
		'show_in_rest' => null, // добавить в REST API
		'rest_base' => null, // $taxonomy
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true, //'query_var' => $taxonomy, // название параметра запроса
		'capabilities' => array(),
		'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column' => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin' => false,
		'show_in_quick_edit' => null, // по умолчанию значение show_ui
	));
	## Развлечения
	### Таксономии. Услуги
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('entertainment', array('services'), array(
		'label' => '', // определяется параметром $labels->name
		'labels' => array(
			'name' => 'Развлечения',
			'singular_name' => 'Развлечения',
			'search_items' => 'Поиск',
			'all_items' => 'Все развлечения',
			'view_item ' => 'Просмотр раздела',
			'parent_item' => 'Родительский раздел',
			'parent_item_colon' => 'Родительский раздел:',
			'edit_item' => 'Редактировать',
			'update_item' => 'Обновить',
			'add_new_item' => 'Добавить',
			'new_item_name' => 'Название',
			'menu_name' => 'Развлечения',
		),
		'description' => '', // описание таксономии
		'public' => true,
		'publicly_queryable' => null, // равен аргументу public
		'show_in_nav_menus' => true, // равен аргументу public
		'show_ui' => true, // равен аргументу public
		'show_in_menu' => true, // равен аргументу show_ui
		'show_tagcloud' => true, // равен аргументу show_ui
		'show_in_rest' => null, // добавить в REST API
		'rest_base' => null, // $taxonomy
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true, //'query_var' => $taxonomy, // название параметра запроса
		'capabilities' => array(),
		'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column' => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin' => false,
		'show_in_quick_edit' => null, // по умолчанию значение show_ui
	));
}

add_action('init', 'register_post_types');

function get_carbon_translated( $param, $lang = false) {

	$translate_str = carbon_get_theme_option( $param );

	if ( !$lang ) {
		$lang = pll_current_language();
	}
	if ( $lang != 'en' ) {
		$translate_str =  carbon_get_theme_option( $param . '_' . $lang );
	}

	return $translate_str;
}

// Страны к Направлению
add_action('add_meta_boxes', function () {
	add_meta_box( 'location_country', 'Страны', 'location_country', 'location', 'side', 'low'  );
}, 1);

// Направления
function location_country( $post ){
	$teams = get_posts(array( 'post_type'=>'countries', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $teams ){
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
		';

		foreach( $teams as $team ){
			echo '
			<li><label>
				<input type="radio" name="post_parent" value="'. $team->ID .'" '. checked($team->ID, $post->post_parent, 0) .'> '. esc_html($team->post_title) .'	
			</label></li>
			';
		}

		echo '
			</ul>
		</div>';
	}
	else
		echo 'Стран нет...';
}

// Проверка подключения Направлений
add_action('add_meta_boxes', function(){
	add_meta_box( 'location', 'Направления', 'location_countries', 'countries', 'side', 'low'  );
}, 1);

function location_countries( $post ){
	$players = get_posts(array( 'post_type'=>'location', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $players ){
		foreach( $players as $player ){
			echo $player->post_title .'<br>';
		}
	}
	else
		echo 'Направлений нет...';
}

// ============================================

// Страны к Услугам
add_action('add_meta_boxes', function () {
	add_meta_box( 'services_country', 'Страны', 'services_country', 'services', 'side', 'low'  );
}, 1);

// Услуги
function services_country( $post ){
	$teams = get_posts(array( 'post_type'=>'countries', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $teams ){
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
		';

		foreach( $teams as $team ){
			echo '
			<li><label>
				<input type="radio" name="post_parent" value="'. $team->ID .'" '. checked($team->ID, $post->post_parent, 0) .'> '. esc_html($team->post_title) .'	
			</label></li>
			';
		}

		echo '
			</ul>
		</div>';
	}
	else
		echo 'Стран нет...';
}


// Проверка подключения Услуг
add_action('add_meta_boxes', function(){
	add_meta_box( 'services', 'Услуги', 'services_countries', 'countries', 'side', 'low'  );
}, 1);

function services_countries( $post ){
	$players = get_posts(array( 'post_type'=>'services', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $players ){
		foreach( $players as $player ){
			echo $player->post_title .'<br>';
		}
	}
	else
		echo 'Услуг нет...';
}

$pll_name_theme = "insight";
$pll_string = "Страны";
$pll_group = "insight";
$pll_multiline = true;
pll_register_string($pll_name_theme, $pll_string, $pll_group, $pll_multiline);


/**
 * Заменяет название страницы блога в хлебных крошках Yoast SEO на "Блог".
 *
 * @param string $link_output   Вывод ссылки.
 * @param array  $link          Информация о ссылке.
 * @param array  $link_info     Дополнительная информация о ссылке.
 * @return string Измененный вывод ссылки.
 */
/* function egomia_yoast_breadcrumb_blog_title($link_output, $link, $link_info) {

	// $blog_page_id = get_option('page_for_posts');

	if ($link_output['ptarchive'] == 'countries') {
		$link_output['text'] = 'Countries';
		}

	return $link_output;
	}
add_filter('wpseo_breadcrumb_single_link_info', 'egomia_yoast_breadcrumb_blog_title', 10, 3); */