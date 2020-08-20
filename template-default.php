<?php

/**
 * Template Name: Default page
 * Description: Default page.
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Timber\Timber;
use Timber\Page;


class Block extends Page
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



$context         = Timber::get_context();
$context['post'] = new Post();
$context['block'] = new Block();
$templates        = array('index.twig');
if (is_home()) {
    array_unshift($templates, 'front.twig', 'home.twig');
}
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





$query = array(
    // 'category_name' => '1',
    // 'post_type' => 'aktsiyni-tovary',
    // 'term_id' => 6,
    // 'term_taxonomy_id' => 7
    'category_nicename' => 'aktsiyni-tovary',
    'custom_crb_akcia' => true,
    "term_id" => 2
);

var_dump($query);

$posts = Timber::get_posts($query);

//var_dump($posts);

$sorted_posts = array();

foreach ($posts as $post) {
    // Get first category of post
    $category = $post->category();

    // Fill post back to sorted_posts
    $sorted_posts[$category->slug][] = $post;
}

// Add sorted posts to context
$context['posts'] = $sorted_posts;







$context = Timber::get_context();
$post = new TimberPost();
$context['page'] = $post;
$context['categories'] = Timber::get_terms('category', array('parent' => 0));

$args = array(
    'numberposts' => -1,
    'post_type' => 'aktsiyni-tovary',
    'term_id' => 6,
);

$context['job'] = Timber::get_posts($args);

Timber::render('page-templates/job.twig', $context);




var_dump(get_the_category());

echo 'cat';
$categories = get_the_category(1);
var_dump($categories);




foreach ((get_the_category()) as $category) {
    echo $category->cat_name . ' ';
}
?>

Категория: <?php foreach ((get_the_category()) as $category) {
                echo '<a href="' . get_category_link($category->cat_ID) . '" title="' . $category->cat_name . '">' . $category->cat_name . '</a>; ';
            } ?>






<?php   // Get terms for post
$terms = get_the_terms($post->ID, 'akc');
// Loop over each item since it's an array
if ($terms != null) {
    foreach ($terms as $term) {
        // Get rid of the other data stored in the object, since it's not needed
        unset($term);
    }
} ?>