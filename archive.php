<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Timber\Timber;
use Timber\Post;


class Block extends Post
{
	public $_slider_title;
	public $_site_logo;
	public $_phone1;
	public $_phone2;
	public $_address;
	public $_socials;




	public function site_logo()
	{
		$this->_site_logo = carbon_get_theme_option('crb_logo');
		return $this->_site_logo;
	}
	public function slider_title()
	{
		$this->_slider_title = carbon_get_theme_option('crb_slider_title');
		return $this->_slider_title;
	}
	public function phone1()
	{
		$this->_phone1 = carbon_get_theme_option('crb_phone1');
		return $this->_phone1;
	}
	public function phone2()
	{
		$this->_phone2 = carbon_get_theme_option('crb_phone2');
		return $this->_phone2;
	}
	public function address()
	{
		$this->_address = carbon_get_theme_option('crb_address');
		return $this->_address;
	}
	public function socials()
	{
		$this->_socials = carbon_get_theme_option('crb_socials');
		return $this->_socials;
	}
}


// $context          = Timber::context();
// $context['posts'] = new Timber\PostQuery();
// $context['foo']   = 'bar';
// $templates        = array('index.twig');
// if (is_home()) {
// 	array_unshift($templates, 'front.twig', 'home.twig');
// }
// Timber::render($templates, $context);



$context         = Timber::get_context();
$context['post'] = new Post();
$context['block'] = new Block();



// $category = get_queried_object(); // will give you current WP_Term

// if ($category->parent == 0) {

// 	// parent category
// 	$templates = array('archive.twig', 'index.twig');
// 	//$context['dataForParentCategory'] = array( ... );
// } else {

// 	// child category
// 	$templates = array('archive.twig', 'index.twig');
// 	//$context['dataForChildCategory'] = array( ... );
// }

// Timber::render($templates, $context);

$templates = array('archive.twig', 'index.twig');



$context['title'] = 'Archive';
if (is_day()) {
	$context['title'] = 'Archive: ' . get_the_date('D M Y');
} elseif (is_month()) {
	$context['title'] = 'Archive: ' . get_the_date('M Y');
} elseif (is_year()) {
	$context['title'] = 'Archive: ' . get_the_date('Y');
} elseif (is_tag()) {
	$context['title'] = single_tag_title('', false);
} elseif (is_category()) {
	$context['title'] = single_cat_title('', false);
	array_unshift($templates, 'archive-' . get_query_var('cat') . '.twig');
} elseif (is_post_type_archive()) {
	$context['title'] = post_type_archive_title('', false);
	array_unshift($templates, 'archive-' . get_post_type() . '.twig');
}

if (is_home()) {
	array_unshift($templates, 'front.twig', 'home.twig');
}
Timber::render($templates, $context);