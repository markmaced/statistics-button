<?php

function generate_statistics_button($text, $link){
    ob_start();
    ?>
    <a href="<?php echo esc_url($link); ?>" class="statistics-create" data-nonce="<?php echo wp_create_nonce('statistics_nonce'); ?>">
        <?php echo esc_html($text); ?>
    </a>
    <?php
    return ob_get_clean();
}

function statistics_button_shortcode($atts){
    $atts = shortcode_atts(
        array(
            'text' => 'Clique aqui',
            'link' => '#',
        ),
        $atts,
        'statistics_button'
    );
    return generate_statistics_button($atts['text'], $atts['link']);
}

// Registrar o shortcode
add_shortcode('statistics_button', 'statistics_button_shortcode');