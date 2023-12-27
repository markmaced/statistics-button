<?php
add_action('wp_ajax_nopriv_register_button_click', 'register_button_click');
add_action('wp_ajax_register_button_click', 'register_button_click');

function register_button_click() {
  global $wpdb;

  if (check_ajax_referer('statistics_nonce', 'nonce', false) === false) {
    wp_send_json_error('Nonce inválido');
  }

  $table_name = $wpdb->prefix . 'statistics_data';
  $data = current_time('mysql');

  $wpdb->insert($table_name, array('click_time' => $data));

  wp_send_json_success('Registro salvo com sucesso');
}