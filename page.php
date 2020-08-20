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


$context         = Timber::context();
$timber_post     = Timber::query_post();
$context['block'] = new Block();
$context['post'] = $timber_post;
Timber::render(array('page-' . $timber_post->post_name . '.twig', 'page.twig'), $context);