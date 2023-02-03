<?php

/**
 * Theme filters.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

/*
 * Add "Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="'.get_permalink().'">'.__('Continued', 'sage').'</a>';
});

/*
 * @author Kenny (kenny@growwithom.com)
 * Add page slug class to the body element
 *
 * @param mixed $classes
 */

add_filter('body_class', function ($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type.'-'.$post->post_name;
    }

    return $classes;
});

/*
 * @author Kenny (kenny@growwithom.com)
 * Save ACF fields
 *
 * @param mixed $path
 */

add_filter('acf/settings/save_json', function ($path) {
    return get_template_directory().'/includes/acf/json';
});

/*
 * @author Kenny (kenny@growwithom.com)
 * Load ACF fields
 *
 * @param mixed $paths
 */

add_filter('acf/settings/load_json', function ($path) {
    $paths[] = get_template_directory().'/includes/acf/json/';

    return $paths;
});