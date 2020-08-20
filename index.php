<?php



use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Timber\Timber;
use Timber\Post;


class Block extends Post
{
	public $_slider_title;
	public $_site_logo;
	public $_site_bg;
	public $_phone1;
	public $_phone2;
	public $_address;
	public $_socials;

	public $_akcia;


	public $_catimg1;
	public $_catimg2;
	public $_catimg3;
	public $_catimg4;
	public $_catimg5;
	public $_catimg6;
	public $_catimg7;
	public $_catimg8;
	public $_catimg9;
	public $_catimg10;
	public $_catimg11;


	public function catimg1()
	{
		$this->_catimg1 = carbon_get_theme_option('crb_catimg1');
		return $this->_catimg1;
	}
	public function catimg2()
	{
		$this->_catimg2 = carbon_get_theme_option('crb_catimg2');
		return $this->_catimg2;
	}
	public function catimg3()
	{
		$this->_catimg3 = carbon_get_theme_option('crb_catimg3');
		return $this->_catimg3;
	}
	public function catimg4()
	{
		$this->_catimg4 = carbon_get_theme_option('crb_catimg4');
		return $this->_catimg4;
	}
	public function catimg5()
	{
		$this->_catimg5 = carbon_get_theme_option('crb_catimg5');
		return $this->_catimg5;
	}
	public function catimg6()
	{
		$this->_catimg6 = carbon_get_theme_option('crb_catimg6');
		return $this->_catimg6;
	}
	public function catimg7()
	{
		$this->_catimg7 = carbon_get_theme_option('crb_catimg7');
		return $this->_catimg7;
	}
	public function catimg8()
	{
		$this->_catimg8 = carbon_get_theme_option('crb_catimg8');
		return $this->_catimg8;
	}
	public function catimg9()
	{
		$this->_catimg9 = carbon_get_theme_option('crb_catimg9');
		return $this->_catimg9;
	}
	public function catimg10()
	{
		$this->_catimg10 = carbon_get_theme_option('crb_catimg10');
		return $this->_catimg10;
	}
	public function catimg11()
	{
		$this->_catimg11 = carbon_get_theme_option('crb_catimg11');
		return $this->_catimg11;
	}


	public function catimg()
	{
		$this->_catimg = carbon_get_theme_option('crb_catimg');
		return $this->_catimg;
	}
	public function akcia()
	{
		$this->_akcia = carbon_get_theme_option('crb_akcia');
		return $this->_akcia;
	}

	public function site_logo()
	{
		$this->_site_logo = carbon_get_theme_option('crb_logo');
		return $this->_site_logo;
	}
	public function site_bg()
	{
		$this->_site_bg = carbon_get_theme_option('crb_bg');
		return $this->_site_bg;
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
$templates        = array('index.twig');
if (is_home()) {
	array_unshift($templates, 'front.twig', 'home.twig');
}

// $context = Timber::get_context();
// $post = new TimberPost();
// $context['post'] = $post;
$context['categories'] = Timber::get_terms('category', array('parent' => 0));

$args = array(
	'numberposts' => 10,
	// 'post_type' => 'aktsiyni-tovary',
	'term_id' => 19,
	'terms' => 'Акційні товари'
);

$context['promotionals'] = Timber::get_posts($args);

// Timber::render('templates/promotionals.twig', $context);

Timber::render($templates, $context);


// Timber::render( array(
//     'pages/page-' . $post->post_name . '.twig',
//     // 'pages/page-location-single.twig'
//     'pages/page-location-single-bootstrap.twig'
// ), $context );


// $context         = Timber::get_context();
// $context['post'] = new Post();
// $context['carbonlocations'] = new Carbonlocations();

// Timber::render( array(
//     'pages/page-' . $post->post_name . '.twig',
//     // 'pages/page-location-single.twig'
//     'pages/page-location-single-bootstrap.twig'
// ), $context );




// $context['term'] = new Timber\Term(1);
// //Get a term when on a term archive page
// $context['term_page'] = new Timber\Term();
// //Get a term with a slug
// $context['team'] = new Timber\Term('patriots');
// //Get a team with a slug from a specific taxonomy
// $context['st_louis'] = new Timber\Term('cardinals', 'baseball');
// Timber::render('index.twig', $context);




//akcia
// $query = array(
// 	// 'category_name' => '1',
// 	// 'post_type' => 'aktsiyni-tovary',
// 	// 'term_id' => 6,
// 	// 'term_taxonomy_id' => 7
// 	// 'category_nicename' => 'aktsiyni-tovary',
// 	'custom_crb_akcia' => true,
// 	// "term_id" => 2
// );

// var_dump($query);

// $akcia = Timber::get_posts($query);

// //var_dump($posts);

// $sorted_posts = array();

// foreach ($akcia as $akcia) {
// 	// Get first category of post
// 	$category = $akcia->category();

// 	// Fill post back to sorted_posts
// 	$sorted_posts[$category->slug][] = $akcia;
// }

// // Add sorted posts to context
// $context['posts'] = $sorted_posts;



// $context = Timber::get_context();
// $post = new TimberPost();
// $context['post'] = $post;
// $context['categories'] = Timber::get_terms('category', array('parent' => 0));

// $args = array(
// 	'numberposts' => 10,
// 	// 'post_type' => 'aktsiyni-tovary',
// 	'term_id' => 19,
// 	'terms' => 'Акційні товари'
// );

// $context['promotionals'] = Timber::get_posts($args);

// Timber::render('templates/promotionals.twig', $context);



// foreach ((get_the_category()) as $category) {
// 	echo $category->cat_name . ' ';
// }
// foreach ((get_the_category()) as $category) {
// 	echo '<a href="' . get_category_link($category->cat_ID) . '" title="' . $category->cat_name . '">' . $category->cat_name . '</a>; ';
// }