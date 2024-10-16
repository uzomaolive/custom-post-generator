<?php
/*
Plugin Name: Post Status Plugin
Description: A plugin to add custom post statuses in WordPress.
Version: 1.0
Author: Olive Uzoma
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function custom_post_statuses() {
    // Register the Archived status
    register_post_status('archived', array(
        'label' => _x('Archived', 'post status'),
        'public' => false,
        'exclude_from_search' => false,
        'show_in_admin_status_list' => true,
        'show_in_admin_all_list' => true,
        'label_count' => _n_noop('Archived <span class="count">(%s)</span>', 'Archived <span class="count">(%s)</span>')
    ));

    // Register the Approved status
    register_post_status('approved', array(
        'label' => _x('Approved', 'post status'),
        'public' => true, // Changed to true 
        'exclude_from_search' => false,
        'show_in_admin_status_list' => true,
        'show_in_admin_all_list' => true,
        'label_count' => _n_noop('Approved <span class="count">(%s)</span>', 'Approved <span class="count">(%s)</span>')
    ));

    // Register the Rejected status
    register_post_status('rejected', array(
        'label' => _x('Rejected', 'post status'),
        'public' => false,
        'exclude_from_search' => false,
        'show_in_admin_status_list' => true,
        'show_in_admin_all_list' => true,
        'label_count' => _n_noop('Rejected <span class="count">(%s)</span>', 'Rejected <span class="count">(%s)</span>')
    ));
}
add_action('init', 'custom_post_statuses');

function add_custom_post_statuses_to_post($post_statuses) {
    $post_statuses['archived'] = _x('Archived', 'post status');
    $post_statuses['approved'] = _x('Approved', 'post status');
    $post_statuses['rejected'] = _x('Rejected', 'post status');
    return $post_statuses;
}
add_filter('post_statuses', 'add_custom_post_statuses_to_post');

?>