<?php
add_theme_support('post-thumbnails');
/**
 * family_psih functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package family_psih
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function family_psih_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on family_psih, use a find and replace
		* to change 'family_psih' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'family_psih', get_template_directory() . '/languages' );

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
    add_image_size('article_thumb',400,305,true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'family_psih' ),
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
			'family_psih_custom_background_args',
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
add_action( 'after_setup_theme', 'family_psih_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function family_psih_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'family_psih_content_width', 640 );
}
add_action( 'after_setup_theme', 'family_psih_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function family_psih_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'family_psih' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'family_psih' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'family_psih_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function family_psih_scripts() {
	// wp_enqueue_style( 'family_psih-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'family_psih-style', 'rtl', 'replace' );

	wp_enqueue_script( 'family_psih-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'family_psih_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function page_h1_title ($id='') {
    if (!get_field('hide_h1') && page_title($id) !== false) { ?>
        <h1 class="page_title"><span><?=page_title($id)?></span></h1>
    <? }
}
function page_content () {
    if ( !empty(get_the_content()) ) { ?>
        <div class="text"><? the_content(); ?></div>
    <? } else {
        return false;
    }
    return true;
}
function page_title ($id='') {
    $cat_id = '';
    if (!empty($id)) {
        $cat_id = 'category_'.$id;
    }
    $alt_title_cat = get_field('alt_title', $cat_id);
    $alt_title_post = get_field('alt_title', $id);
    $title_cat = single_cat_title('', false);
    $title_post = get_the_title($id);
    if (!empty($alt_title_post)) {
        return $alt_title_post;
    } elseif (!empty($alt_title_cat)) {
        return $alt_title_cat;
    } elseif (!empty($title_cat)) {
        return $title_cat;
    } elseif (!empty($title_post)) {
        return $title_post;
    } else {
        return false;
    }
}
function breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div class="brcr">', '</div>' );
    }
}


// Очищение ссылки на номер телефона
function get_tel_link($text) {
	$tel_link = preg_replace('|[^0-9\+]|', '', $text );
	return $tel_link;
}


add_image_size('sert_thumb2',206,153,false);
add_image_size('rev_thumb',273,485,true);

// Получение ACF картинки
function getACFpicUrl($field, $size_name='', $stub='') {
	if (is_array($field)) {
		if (!empty($size_name)) {
			$pic = $field['sizes'][$size_name];
		} else {
			$pic = $field['url'];
		}
	} else {
		$pic = $field;
	}
	if (empty($pic) && !empty($stub)) {
		$pic = $stub;
	}
	return $pic;
}
function getACFpic($field, $set_params = array()) {
	$def_params = array(
		'modal' => false, 
		'size_name' => '', 
		'stub' => '', 
		'class' => '', 
		'width' => 0, 
		'height' => 0, 
		'alt' => ''
	);
	$params = array_merge($def_params, $set_params);
	extract($params);

	$pic = getACFpicUrl($field, $size_name, $stub);

	if (!empty($pic)) {
		if ( empty($width) && empty($height) ) {
			if ( is_array($field) ) {
				if ( !empty($size_name) ) {
					$width = $field['sizes'][$size_name.'-width'];
					$height = $field['sizes'][$size_name.'-height'];
				} else {
					$width = $field['width'];
					$height = $field['height'];
				}
			} else {
				$pic_data = getimagesize($pic);
				if ( is_array($pic_data) ) {
					$width = $pic_data[0];
					$height = $pic_data[1];
				}
			}
		}

		$pic_info = pathinfo($pic);
		if ($pic_info["extension"] == 'svg') {
			return file_get_contents($pic);
		}
		$tag_img = '<img width="'.$width.'" height="'.$height.'" class="'.$class.'" src="'.$pic.'" alt="'.$alt.'">';
		switch ($modal) {
			case 'fancybox':
				return '<a href="'.getACFpicUrl($field).'" class="fancybox">'.$tag_img.'</a>';
			break;
		}
		return $tag_img;
	}
	return false;
}
function getACFbgImg($field, $size_name='', $stub='') {
	$pic = getACFpicUrl($field, $size_name, $stub);
	if (!empty($pic)) {
		return 'background-image: url('.$pic.')';
	}
	return false;
}

// Обертывание в ACF ссылку
function wrapACFlink($field, $content, $class='') {
	if ( !empty($field) && !is_wp_error($field) ) {
		return '<a href="'.$field.'" class="'.$class.'">'.$content.'</a>';
	} 
	return '<span class="'.$class.'">'.$content.'</span>';
}


// Отправка в телеграм
function wpcf7_telegram_before_send_mail() {
	$token = '5589212654:AAFv2WpJXv68vgHI9EUAm3Ps4D0sPxiX0xg';
	$chat_id = '-636137667';
	$txt = '';
	$txt .= "ЗАЯВКА С САЙТА";
	$txt .= "%0A%0AИмя: ".strip_tags(trim(urlencode($_POST['your_name'])));
	$txt .= "%0AТелефон: ".strip_tags(trim(urlencode($_POST['your_phone'])));
	$txt .= "%0AУслуга: ".strip_tags(trim(urlencode($_POST['your-seans'])));
	if ( !empty($txt) ) {
		file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
	}
}

add_action( 'wpcf7_before_send_mail', 'wpcf7_telegram_before_send_mail' );