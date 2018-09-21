<?php

// Load css/javascript files in wordpress
function loadFiles() {
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('index_css', get_stylesheet_uri(), NULL, microtime());
}
add_action('wp_enqueue_scripts', 'loadFiles');


function enableFeatures() {
    add_theme_support('title-tag'); // enables the title tag per page
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocation1', 'Footer Location 1');
    register_nav_menu('footerLocation2', 'Footer Location 2');
}

add_action('after_setup_theme', 'enableFeatures');

?>
