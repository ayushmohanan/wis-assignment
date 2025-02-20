<?php
if (!defined('ABSPATH')) {
    exit;
}
class CPT_Books
{
    public function __construct()
    {
        add_action('init', [$this, 'register_books_cpt']);
        add_action('init', [$this, 'register_genre_taxonomy']);
    }
    /**
     * Register Books CPT
     */
    public function register_books_cpt()
    {
        $labels = array(
            'name' => __('Books', 'Post Type Genera Name', 'Books'),
            'singular_name' => __('Book', 'Post Type Singular Name', 'Book'),
            'menu_name' => __('Books', 'Books'),
            'archives' => __('Books Archives', 'Books'),
            'all_items' => __('All Books', 'Books'),
            'name_admin_bar' => __('Book', 'Books'),
            'add_new' => __('Add New', 'Books'),
            'add_new_item' => __('Add New Book', 'Books'),
            'new_item' => __('New Book', 'Books'),
            'edit_item' => __('Edit Book', 'Books'),
            'view_item' => __('View Book', 'Books'),
            'search_items' => __('Search Books', 'Books'),
            '_item' => __('New Books', 'Books'),
            'not_found' => __('No books found.', 'Books'),
            'not_found_in_trash' => __('No books found in Trash.', 'Books'),
            'fetured_image' => __('Featured Image', 'Books'),
            'set_fetured_image' => __('Set Featured Image', 'Books'),
            'remove_fetured_image' => __('Remove Featured Image', 'Books'),
            'use_fetured_image' => __('Use as a Featured Image', 'Books'),
            'uploaded_to_this_item' => __('Uploaded To This Books', 'Books'),
            'item_lsit' => __('Books list', 'Books'),
            'item_list_navigation' => __('Books List Navigation', 'Books'),
            'filter_item_list' => __('Filter Books List', 'Books'),
        );
        $args = array(
            'label' => __('books', 'books'),
            'description' => __('CPT Books', 'Books'),
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'books'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-book',
            'exclude_from_search' => false,
            'supports' => array('title', 'editor', 'author', 'thumbnail'),
            'show_in_rest' => true,  #REST enabling
        );
        register_post_type('book', $args);
    }
    /**
     * Register Genres CPT
     */
    public function register_genre_taxonomy()
    {
        $labels = [
            'name' => __('Genres', 'taxonomy general name'),
            'singular_name' => __('Genre', 'taxonomy singular name'),
            'search_items' => __('Search Genres'),
            'all_items' => __('All Genres'),
            'parent_item' => __('Parent Genre'),
            'parent_item_colon' => __('Parent Genre:'),
            'edit_item' => __('Edit Genre'),
            'update_item' => __('Update Genre'),
            'add_new_item' => __('Add New Genre'),
            'new_item_name' => __('New Genre Name'),
            'menu_name' => __('Genres'),
        ];
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'genre'),
        );
        register_taxonomy('genre', array('book'), $args);
    }
}