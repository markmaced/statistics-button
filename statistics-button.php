<?php 

/*
Plugin Name: Statistics Button
Description: Um botão que coleta os cliques e salva no banco de dados.
Version: 1.0
Author: Marcos Macedo
*/

require_once plugin_dir_path(__FILE__) . '/inc/statistics-table.php';
require_once plugin_dir_path(__FILE__) . '/inc/shortcodes/button.php';
require_once plugin_dir_path(__FILE__) . '/inc/register-statistics.php';

function statistics_scripts() {
    wp_enqueue_script( 'statistics-script', plugin_dir_url( __FILE__ ) . '/assets/js/app.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style( 'statistics-style' , plugin_dir_url( __FILE__ ) . '/assets/css/main.css' );
    wp_localize_script( 'statistics-script', 'wpurl',
    array( 
        'ajax' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'statistics_scripts' );