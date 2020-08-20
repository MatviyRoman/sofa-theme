<?php

 /* File: page-about-us.php */

use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = Timber::query_post();
Timber::render( 'pages/page-about-us.twig', $context );