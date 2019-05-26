<?php
function regis_sale_book_menu() {
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
add_action( 'admin_menu', 'regis_sale_book_menu' );

function wp_sale_book_manager(){
    $table_name = "wp_sale_books";
    $results =  $GLOBALS['wpdb']->get_results( "SELECT * FROM $table_name");
    require dirname(__DIR__, 1).'/front-end/sale_book_management.php';
    deleteItem($table_name);
    updateStatus($table_name);
}