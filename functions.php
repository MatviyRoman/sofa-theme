<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



/**
 * Disable the emoji's
 */
function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');

function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}
/**
 * Filter out the tinymce emoji plugin.
 */


function disabled_editor()
{
	//remove_post_type_support('page', 'editor');
	return false;
}

add_action('carbon_register_fields', 'crb_register_homepage_fields');
function crb_register_homepage_fields()
{
	add_action('admin_head', 'disabled_editor');
	return false;
}

add_filter('use_block_editor_for_post_type', 'disable_gutenberg_editor');
function disable_gutenberg_editor()
{
	add_action('admin_head', 'remove_editor');
	return false;
}

function remove_editor()
{
	// remove_post_type_support('page', 'editor');
	return false;
}


add_action('carbon_fields_register_fields', 'crb_attach_post_meta');

function crb_attach_post_meta()
{
	Container::make('post_meta', __('Ціна', 'crb'))
		->where('post_type', '=', 'page')
		->add_fields(array(
			Field::make('text', 'crb_price', '')
				->set_width(100),
		));
	Container::make('post_meta', __('Опис товару', 'crb'))
		->where('post_type', '=', 'post')
		->add_fields(array(
			Field::make('textarea', 'crb_textarea', '')
				->set_width(100),
		));
	Container::make('post_meta', __('Характеристики товару', 'crb'))
		->where('post_type', '=', 'post')
		->add_fields(array(
			Field::make('text', 'crb_1', 'Ширина'),
		))
		->add_fields(array(
			Field::make('text', 'crb_2', 'Висота'),
		))
		->add_fields(array(
			Field::make('text', 'crb_3', 'Глибина'),
		))
		->add_fields(array(
			Field::make('text', 'crb_4', 'Довжина'),
		))
		->add_fields(array(
			Field::make('text', 'crb_5', 'Спальне місце'),
		))
		->add_fields(array(
			Field::make('text', 'crb_6', 'Механізм трансформації'),
		))
		->add_fields(array(
			Field::make('text', 'crb_7', 'Матеріал фасаду'),
		))
		->add_fields(array(
			Field::make('text', 'crb_8', 'Колір'),
		))
		// ->add_fields(array(
		// 	Field::make('complex', 'crb_88', 'Колір')
		// 		->add_fields(array(
		// 			Field::make('color', 'name')->set_help_text('Вкажіть колір')
		// 		))
		// ))
		->add_fields(array(
			Field::make('text', 'crb_9', 'Наявність'),
		))
		->add_fields(array(
			Field::make('text', 'crb_10', 'Виробник'),
		))
		->add_fields(array(
			Field::make('checkbox', 'crb_akcia', 'Акційний товар')
				->set_option_value('true')
				->set_help_text('Якщо чекбокс обраний, то товар буде показано в акційних товарах'),
		));
}



add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
	Container::make('theme_options', 'Theme Options', 'Налаштування сайту', 'crb')
		// Container::make('theme_options', __('Theme Options', 'crb'))
		->add_tab('Логотип сайту', array(
			Field::make('image', 'crb_logo', 'Логотип')
				->set_value_type('url')
				->set_width(50)
				->set_help_text('Оберіть логотип вашого сайту'),
		))
		->add_tab('Зображення', array(
			Field::make('image', 'crb_bg', 'Зображення')
				->set_value_type('url')
				->set_width(50)
				->set_help_text('Оберіть зображення для головної сторінки'),
		))
		->add_tab('Зображення для категорій', array(
			Field::make('image', 'crb_catimg1', 'Зображення для категорії дивани')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg2', 'Зображення для категорії шафи-купе')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg3', 'Зображення для категорії кухні')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg4', 'Зображення для категорії спальні')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg5', 'Зображення для категорії вітальні')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg6', 'Зображення для категорії передпокої')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg7', 'Зображення для категорії дитячі')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg8', 'Зображення для категорії столи')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg9', 'Зображення для категорії стільці')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg10', 'Зображення для категорії комоди і тумби')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
			Field::make('image', 'crb_catimg11', 'Зображення для категорії матраци')
				->set_value_type('url')
				->set_help_text('Оберіть зображення для категорії'),
		))
		->add_tab('Телефон', array(
			Field::make('text', 'crb_phone1', 'Телефоний номер 1')
				->set_required()
				->set_help_text('Введіть номер телефону вашого магазину'),
			Field::make('text', 'crb_phone2', 'Телефоний номер 2')
				->set_help_text('Введіть номер телефону вашого магазину'),
		))
		->add_tab('Адрес', array(
			Field::make('text', 'crb_address', 'Адреса магазина')
				->set_help_text('Введіть адресу вашого магазину'),
		))
		->add_tab('Слайдер', array(
			Field::make('text', 'crb_slider_title', 'Назва Блоку слайдера')
				->set_help_text('Введіть назву блоку слайдера, якщо поле залишити пустим, то цей блок не буде відображатися'),
		))


		// ->add_tab('Соціальні мережі', array(
		// 	Field::make('text', 'crb_social_url_instagram', 'Instagram URL')
		// 		->set_help_text('Введіть ваш Instagram сторінку url'),
		// 	Field::make('text', 'crb_social_url_facebook', 'Facebook URL')
		// 		->set_help_text('Введіть ваш Facebook сторінку url'),
		// ))

		->add_tab('Соціальні мережі', array(
			Field::make('complex', 'crb_socials', 'Соціальні мережі')
				->add_fields(array(
					Field::make('image', 'image', 'Оберіть зображення') // We're only changing the label field to an image one
						->set_value_type('url')
						->set_width(50)
						->set_required()
						->set_help_text('Оберіть зображення для соціальної мережі'),
					Field::make('text', 'url', 'URL')
						->set_width(50)
						->set_required()
						->set_help_text('Введіть URL адресу'),
				)),
		));


	// Container::make('post_meta', 'Custom Data')
	// 	->where('post_type', '=', 'page')
	// 	->add_fields(array(
	// 		Field::make('map', 'crb_location')
	// 			->set_position(37.423156, -122.084917, 14),
	// 		Field::make('sidebar', 'crb_custom_sidebar'),
	// 	));


	// Container::make('term_meta', __('Category Properties'))
	// 	// ->where('term_taxonomy', '=', 'category')
	// 	->add_fields(array(
	// 		// Field::make('text', 'crb_title', __('Title')),
	// 		// Field::make('color', 'crb_title_color', __('Title Color')),
	// 		// Field::make('image', 'crb_catimg', __('Thumbnail')),
	// 	));


	// Container::make('post_meta', 'Музыка')
	// 	->show_on_post_type('page')
	// 	->add_fields([
	// 		Field::make('text', 'crb_song_author', 'Имя исполнителя')
	// 			->set_width(50)
	// 	]);

	// ->add_tab(__('Google map'), array(
	// 	//Google map link
	// 	Field::make('text', 'crb_google_map', __('Google map link')),
	// 	Field::make('text', 'crb_google_map_label', __('Aria-label for map'))
	// 		->help_text('Help text')
	// ));


	// Container::make('post_meta', 'Вложенные комплексные поля')
	// 	->add_tab('Просто вкладка', [
	// 		Field::make('complex', 'image_box', 'Комплексное поле')
	// 			->set_layout('tabbed-horizontal')
	// 			->add_fields(array(
	// 				Field::make('image', 'image_box_item', 'Изображение')
	// 					->set_value_type('url')
	// 			))
	// 	]);
}




/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ($template) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site
{
	/** Add timber support. */
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types()
	{
	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies()
	{
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context($context)
	{
		// $context['foo']   = 'bar';
		// $context['stuff'] = 'I am a value set in your functions.php file';
		// $context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				// 'comment-form',
				// 'comment-list',
				// 'gallery',
				// 'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				// 'aside',
				// 'image',
				// 'video',
				// 'quote',
				// 'link',
				// 'gallery',
				// 'audio',
			)
		);

		add_theme_support('menus');
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	// public function myfoo($text)
	// {
	// 	$text .= ' bar!';
	// 	return $text;
	// }

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig($twig)
	{
		$twig->addExtension(new Twig\Extension\StringLoaderExtension());
		// $twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}
}

new StarterSite();