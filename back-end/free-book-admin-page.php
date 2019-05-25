<?php
require 'regis-free-book-menu.php';
function wp_free_book_manager(){
    $table_name = "wp_free_books";
    $results =  $GLOBALS['wpdb']->get_results( "SELECT * FROM $table_name");
    require 'free-book-admin-page-form.php';
    deleteItem($table_name);
    updateStatus($table_name);
}
?>