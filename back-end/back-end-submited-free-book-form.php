<?php
if (isset($_POST['free_book_submited'])) {
    $table_name = "wp_free_books";
    $account_number = test_input($_POST["account_number"]);
    $broker = test_input($_POST['broker']);
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $province = test_input($_POST['province']);
    $amphoe = test_input($_POST['amphoe']);
    $zip_code = test_input($_POST['zip_code']);
    $place = test_input($_POST['place']);
    $tel = test_input($_POST['tel']);
    $email = test_input($_POST['email']);
    $facebook_name = test_input($_POST['facebook_name']);
    $count = $GLOBALS['wpdb']->get_var("SELECT COUNT(*) FROM $table_name WHERE account_number = '$account_number' OR firstname = '$firstname' AND lastname = '$lastname' OR email = '$email'");

    if ($count > 0) {
        echo "
            <script>
                jQuery('#duplicateRecordErr').css({'display':'block'});
            </script>
        ";
    } else {
        $sql = $GLOBALS['wpdb']->insert($table_name, array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "province" => $province,
            "amphoe" => $amphoe,
            "zip_code" => $zip_code,
            "place" => $place,
            "account_number" => $account_number,
            "broker" => $broker,
            "email" => $email,
            "tel" => $tel,
            "facebook_name" => $facebook_name,
            "status" => false,
        ));
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
