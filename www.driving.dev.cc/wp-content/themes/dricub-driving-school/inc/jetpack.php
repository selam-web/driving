<?php

/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package dricub_driving_school
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function dricub_driving_school_jetpack_setup() {
    // Add theme support for Infinite Scroll.
    add_theme_support('infinite-scroll', array(
        'container' => 'main',
        'render' => 'dricub_driving_school_infinite_scroll_render',
        'footer' => 'page',
    ));
    // Add theme support for Responsive Videos.
    add_theme_support('jetpack-responsive-videos');
}

add_action('after_setup_theme', 'dricub_driving_school_jetpack_setup');

/**
 * Custom render function for Infinite Scroll.
 */
function driving_school_infinite_scroll_render() {
    while (have_posts()) {
        the_post();
        if (is_search()) :
            get_template_part('template-parts/content', 'search');
        else :
            get_template_part('template-parts/content', get_post_format());
        endif;
    }
}
