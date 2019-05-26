<?php
function regis_free_book_menu() {
    add_menu_page(
        __( 'ระบบตรวจสอบการแจกหนังสือ(ฟรี)', 'textdomain' ),
        'ระบบตรวจสอบการแจกหนังสือ(ฟรี)',
        'manage_options',
        'free-books-manger.php',
        'wp_free_book_manager',
        'dashicons-tickets',
        1
    );
}
add_action( 'admin_menu', 'regis_free_book_menu' );
function wp_free_book_manager(){
    $table_name = "wp_free_books";
    $results =  $GLOBALS['wpdb']->get_results( "SELECT * FROM $table_name");
    require dirname(__DIR__, 1).'/front-end/free_book_management.php';
    deleteItem($table_name);
    updateStatus($table_name);
}
?>