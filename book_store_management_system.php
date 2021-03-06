

<?php
/**
 * Plugin Name: Book Store Management System
 * Plugin URI: https://www.facebook.com/pleng.prongpanot
 * Description: We help you to easily manage customer orders
 * Version: 1.0
 * Author: Your Pongpanot Na Ubon
 * Author URI: https://www.facebook.com/pleng.prongpanot
 **/

//Create Talbe to WPDB
register_activation_hook(__FILE__, 'initial_database');
function initial_database()
{
    echo '<script>alert("555");</script>';
    $free_book_table = $GLOBALS['wpdb']->prefix . 'free_books';
    $sale_book_table = $GLOBALS['wpdb']->prefix . 'sale_books';
    $pf_parts_db_version = '1.0.0';
    $charset_collate = $GLOBALS['wpdb']->get_charset_collate();

    //Create Free book Table
    if ($GLOBALS['wpdb']->get_var("SHOW TABLES LIKE '{$free_book_table}'") != $free_book_table) {
        $sql = "CREATE TABLE $free_book_table (
                        id INT NOT NULL AUTO_INCREMENT,
                        firstname varchar(255) DEFAULT '' NOT NULL,
                        lastname varchar(255) DEFAULT '' NOT NULL,
                        province varchar(255) DEFAULT '' NOT NULL,
                        amphoe varchar(255) DEFAULT '' NOT NULL,
                        zip_code varchar(255) DEFAULT '' NOT NULL,
                        place varchar(255) DEFAULT '' NOT NULL,
                        account_number varchar(255) DEFAULT '' NOT NULL,
                        broker varchar(255) DEFAULT '' NOT NULL,
                        email varchar(255) DEFAULT '' NOT NULL,
                        tel varchar(255) DEFAULT '' NOT NULL,
                        facebook_name varchar(255) DEFAULT '' NOT NULL,
                        status tinyint(1) DEFAULT 0 NOT NULL,
                        PRIMARY KEY  (id)
                        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('pf_parts_db_version', $pf_parts_db_version);
    }

    //Create sale book Table
    if ($GLOBALS['wpdb']->get_var("SHOW TABLES LIKE '{$sale_book_table}'") != $sale_book_table) {
        $sql = "CREATE TABLE $sale_book_table (
                        id INT NOT NULL AUTO_INCREMENT,
                        firstname varchar(255) DEFAULT '' NOT NULL,
                        lastname varchar(255) DEFAULT '' NOT NULL,
                        province varchar(255) DEFAULT '' NOT NULL,
                        amphoe varchar(255) DEFAULT '' NOT NULL,
                        zip_code varchar(255) DEFAULT '' NOT NULL,
                        place varchar(255) DEFAULT '' NOT NULL,
                        email varchar(255) DEFAULT '' NOT NULL,
                        tel varchar(255) DEFAULT '' NOT NULL,
                        backup_tel varchar(255) DEFAULT '' NOT NULL,
                        status tinyint(1) DEFAULT 0 NOT NULL,
                        piece INT(1) DEFAULT 0 NOT NULL,
                        PRIMARY KEY  (id)
                        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('pf_parts_db_version', $pf_parts_db_version);
    }

    add_role(
        'manager_user_guide',
        __('Manager User Guide'),
        array(
            'read' => true, // true allows this capability
        )
    );

    $role = get_role('manager_user_guide');
    $role->add_cap('manage_options');
}

register_uninstall_hook(__FILE__, 'deleteDatabase');

// And here goes the uninstallation function:
function deleteDatabase()
{
    //  codes to perform during unistallation
    $free_book_table = $GLOBALS['wpdb']->prefix . 'free_books';
    $sale_book_table = $GLOBALS['wpdb']->prefix . 'sale_books';
    $GLOBALS['wpdb']->query("DROP TABLE IF EXISTS `" . $free_book_table . "`");
    $GLOBALS['wpdb']->query("DROP TABLE IF EXISTS `" . $sale_book_table . "`");
}

function deleteItem($table_name)
{
    if (isset($_POST['delete'])) {
        if (isset($_POST['id'])) {
            foreach ($_POST['id'] as $id) {
                $GLOBALS['wpdb']->delete($table_name, array('id' => $id));
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}

function updateStatus($table_name)
{
    if (isset($_POST['update'])) {
        $status = substr($_POST['update'], -1);
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $id = substr_replace($_POST['update'], "", -1);
        $GLOBALS['wpdb']->update($table_name, array('status' => $status), array('id' => $id));
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

function multipleUpdateStatus($table_name)
{
    if (isset($_POST['multiple_approvement'])) {
        if (isset($_POST['id'])) {
            foreach ($_POST['id'] as $id) {
                $GLOBALS['wpdb']->update($table_name, array('status' => 1), array('id' => $id));
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    if (isset($_POST['multiple_rejection'])) {
        if (isset($_POST['id'])) {
            foreach ($_POST['id'] as $id) {
                $GLOBALS['wpdb']->update($table_name, array('status' => 0), array('id' => $id));
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}

function statusToOptionList($status)
{
    if ($status == 0) {
        echo 'รอการอนุมัติ';
    } else {
        echo 'อนุมัติแล้ว';
    }
}

function handleAddress()
{
    ?>
    <script>
    var lang = jQuery('html').attr('lang');
    if(lang == "en-US"){
        var province_dir = '<?php echo plugin_dir_url(__FILE__); ?>/json/province-en.json';
        var amphoes_dir = '<?php echo plugin_dir_url(__FILE__); ?>/json/amphoes-en.json';
    }else{
        var province_dir = '<?php echo plugin_dir_url(__FILE__); ?>/json/province.json';
        var amphoes_dir = '<?php echo plugin_dir_url(__FILE__); ?>/json/amphoes.json';
    }
    jQuery.ajax({
        type: 'GET',
        url: province_dir,
        data: { get_param: 'value' },
        dataType: 'json',
        success: function (data) {
            jQuery.each(data, function(index, element) {
                jQuery.each( element.changwats, function( key, value ) {
                    jQuery('select[name="province"]').append('<option value="'+value.name+'" pid="'+value.pid+'">'+value.name+'</option>');
                });
            });
        }
    });

    jQuery('select[name="province"]').on('change ', function() {
        jQuery('select[name="amphoe"]')
            .find('option')
            .remove()
            .end()
        ;
        var pidSelected =  jQuery('option:selected', this).attr('pid');
        jQuery.ajax({
        type: 'GET',
        url: amphoes_dir,
        data: { get_param: 'value' },
        dataType: 'json',
        success: function (data) {
            jQuery.each(data, function(index, element) {
                jQuery.each( element.amphoes, function( key, value ) {
                   if(pidSelected == value.changwat_pid){
                    jQuery('select[name="amphoe"]').append('<option value="'+value.name+'" >'+value.name+'</option>');
                   }
                });
            });
        }
        });
    });

    </script>
    <?php
}

function get_current_user_role()
{
    $user = wp_get_current_user();
    $roles = (array) $user->roles;
    return $roles[0];
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require 'load-script.php';

//Free Books backend
require 'back-end/initial_free_book.php';
require 'front-end/free_book_shortcode.php';

//Free Books backend
require 'back-end/initial_sale_book.php';
require 'front-end/sale_book_shortcode.php';
