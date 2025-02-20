<?php
if (!defined('ABSPATH')) {
    exit;
}
class CPT_Activation
{
    public static function rerewrite_flush_activate_plugin() {
        #include cls
        require_once plugin_dir_path(__FILE__) . 'cls-wp-cpt.php';
        $cpt = new CPT_Books();
        $cpt->register_books_cpt();
        $cpt->register_genre_taxonomy();
        flush_rewrite_rules();
    }
    /**
     * to clean the rewrite rules
     */
    public static function rewrite_flush_deactivate_plugin() {
        flush_rewrite_rules();
    }
}
