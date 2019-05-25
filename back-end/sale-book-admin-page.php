<?php
require 'regis-sale-book-menu.php';
function wp_sale_book_manager(){
    $table_name = "wp_sale_books";
    $results =  $GLOBALS['wpdb']->get_results( "SELECT * FROM $table_name");
    require 'sale-book-admin-page-form.php';
    deleteItem($table_name);
    updateStatus($table_name);
}