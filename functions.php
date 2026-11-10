<?php

wp_enqueue_style( 'wp-learning-hub-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

add_theme_support( 'post-thumbnails' );

add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');   
}

// Caption files (.vtt) must come from the same site as the page, or the browser
// drops the captions track. Browsers won't follow a redirect to another site
// for captions, so an old link (learningcentre.gww.gov.bc.ca) breaks after
// the site moved to corporatelearning.gww.gov.bc.ca. Links to this WordPress
// site are turned into root-relative paths so they keep working on any domain.
function latww_caption_url($url) {
    $url = trim((string) $url);
    $wp_hosts = array('learningcentre.gww.gov.bc.ca', 'corporatelearning.gww.gov.bc.ca');
    $host = strtolower((string) parse_url($url, PHP_URL_HOST));
    if (in_array($host, $wp_hosts, true)) {
        $path = (string) parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        return $path . ($query ? '?' . $query : '');
    }
    return $url;
}
