<?php
function statistics_table() {
    if (is_plugin_active('statistics-button/statistics-button.php')) {
        global $wpdb;
        $table = $wpdb->prefix . 'statistics_data';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT NOT NULL AUTO_INCREMENT,
            click_time DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

register_activation_hook(__FILE__, 'statistics_table');

function delete_statistics_table() {
    global $wpdb;
    $table = $wpdb->prefix . 'statistics_data';
    $wpdb->query("DROP TABLE IF EXISTS $table");
}

register_deactivation_hook(__FILE__, 'delete_statistics_table');


add_action('admin_init', 'run_statistics_table');
function run_statistics_table() {
    statistics_table();
}