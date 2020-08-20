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


	public $_location_image;
	public $_location_map;
	public $_location_label;
	public $_location_text_about;
	public $_location_testimonials_show;
	public $_location_testimonials;



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





	public function location_image()
	{
		$this->_location_image = carbon_get_the_post_meta('crb_photo');
		return $this->_location_image;
	}

	public function location_map()
	{
		$this->_location_map = carbon_get_the_post_meta('crb_google_map');
		return $this->_location_map;
	}

	public function location_label()
	{
		$this->_location_label = carbon_get_the_post_meta('crb_google_map_label');
		return $this->_location_label;
	}

	public function location_text_about()
	{
		$this->_location_text_about = apply_filters('the_content', carbon_get_the_post_meta('crb_about_location'));
		return $this->_location_text_about;
	}

	public function location_testimonials_show()
	{
		$this->_location_testimonials_show = carbon_get_the_post_meta('crb_testimonials_show');
		return $this->_location_testimonials_show;
	}

	public function location_testimonials()
	{
		$this->_location_testimonials = apply_filters('crb_testimonials_slider', carbon_get_the_post_meta('crb_testimonials_slider'));
		return $this->_location_testimonials;
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



// $context         = Timber::get_context();
// $context['post'] = new Post();
// $context['block'] = new Block();
// // $templates = array('single.twig', 'index.twig');

// // if (post_password_required($timber_post->ID)) {
// // 	Timber::render('single-password.twig', $context);
// // } else {
// Timber::render(array('single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig'), $context);
// // }

// // $context = Timber::context();


// if (is_home()) {
// 	array_unshift($templates, 'front.twig', 'home.twig');
// }
// Timber::render($templates, $context);




$context         = Timber::context();
$timber_post     = Timber::query_post();
$context['block'] = new Block();
$context['post'] = $timber_post;

if (post_password_required($timber_post->ID)) {
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig'), $context);
}