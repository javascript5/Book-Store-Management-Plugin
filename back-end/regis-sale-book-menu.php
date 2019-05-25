<?php

function sale_book_menu() {
    add_menu_page(
        __( 'ระบบตรวจสอบการขายหนังสือ', 'textdomain' ),
        'ระบบตรวจสอบการขายหนังสือ',
        'manage_options',
        'sale-books-manger.php',
        'wp_sale_book_manager',
        'dashicons-tickets',
        1
    );
}
add_action( 'admin_menu', 'sale_book_menu' );