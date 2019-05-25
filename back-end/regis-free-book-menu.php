<?php
function free_book_menu() {
    add_menu_page(
        __( 'ระบบตรวจสอบการแจกหนังสือ(ฟรี)', 'textdomain' ),
        'ระบบตรวจสอบการแจกหนังสือ(ฟรี)',
        'manage_options',
        'free-books-manger.php',
        'wp_free_book_manager',
        'dashicons-tickets',
        6
    );
}
add_action( 'admin_menu', 'free_book_menu' );