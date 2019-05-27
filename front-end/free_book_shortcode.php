<?php
function free_books_form($atts)
{
    ?>
<div class="free_book_id book_tab">
<script src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>script/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__)); ?>style/style.css" />
<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__)); ?>style/animate.css" />
    <div id="submitedSucess">
            <div>
            <svg class="success" width="90px" height="90px" viewBox="0 0 131 131" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 52.1 (67048) - http://www.bohemiancoding.com/sketch -->
                <title>Group</title>
                <desc>Created with Sketch.</desc>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Desktop" transform="translate(-269.000000, -392.000000)" stroke="#FEED00" stroke-width="11">
                        <g id="Group" transform="translate(275.000000, 398.000000)">
                            <circle id="Oval" cx="59.5" cy="59.5" r="59.5"></circle>
                            <path d="M24,55 L53.1916357,84.1916357" id="Path" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M53.9205884,40.9205884 L97.1916357,84.1916357" id="Path" stroke-linecap="round" stroke-linejoin="round" transform="translate(75.500000, 62.500000) scale(-1, 1) translate(-75.500000, -62.500000) "></path>
                        </g>
                    </g>
                </g>
            </svg>
            </div>
           <div><p>ได้รับข้อมูลเรียบร้อยแล้ว<br> เราจะติดต่อกลับไปภายใน 24ชม.</p></div>
           <div><a href="#" class="confirm_order_button">ตกลง</a></div>
    </div>
    <div class="bg_opacity"></div>

<form id="myForm" method="post" action="" class="book_form animated bounceInUp">
    <div class="browser_tab">
        <div class="circle_wrapper">
            <div class="circle green"></div>
            <div class="circle red"></div>
            <div class="circle yellow"></div>
        </div>
    </div>
    <div id="duplicateRecordErr" class="danger alert max-width" >
          ข้อมูลนี้มีในระบบแล้ว
    </div>

    <div class="max-width">
        <label>Account Number <span>*</span></label>
        <input type="text" name="account_number" value="<?php echo $_POST['account_number'] ?>" required placeholder="กรุณากรอกเลขบัญชีการซื้อขายของท่าน">
    </div>

    <div class="max-width">
        <label>โบรกเกอร์</label>
        <select name="broker" required>
            <option value="">เลือกโบรกเกอร์</option>
            <option value="Hantec Global">Hantec Global</option>
            <option value="XM Global">XM Global</option>
            <option value="Exness">Exness</option>
            <option value="FBS">FBS</option>
            <option value="FXPrimus">FXPrimus</option>
        </select>
    </div>


    <div>
        <label>ชื่อจริง <span>*</span></label>
        <input type="text" name="firstname" value="<?php echo $_POST['firstname'] ?>">
    </div>

    <div>
        <label>นามสกุล <span>*</span></label>
        <input type="text" name="lastname" value="<?php echo $_POST['lastname'] ?>">
    </div>

    <div>
        <label>จังหวัด <span>*</span></label>
        <select name="province" required>
        <option value="" selected>เลือกจังหวัด</option>
        </select>
    </div>

    <div>
        <label>อำเภอ / เขต <span>*</span></label>
        <select name="amphoe" required>
        <option value="" selected>เลือกอำเภอ</option>
        </select>
    </div>

    <div>
        <label>รหัสไปรษณีย์ <span>*</span></label>
        <input type="text" name="zip_code" value="<?php echo $_POST['zip_code'] ?>" required>
    </div>

    <div>
		<label>ที่อยู่ <span>*</span></label>
		<input type="text" name="place" value="<?php echo $_POST['place'] ?>" required>
    </div>

    <div class="max-width">
        <label>เบอร์โทรศัพท์ <span>*</span></label>
        <input type="text" name="tel" value="<?php echo $_POST['tel'] ?>" required>
    </div>

    <div class="max-width">
        <label>อีเมล์ <span>*</span></label>
        <input type="email" name="email" value="<?php echo $_POST['email'] ?>" required>
    </div>

    <div class="max-width">
        <label> Facebook Url ของท่าน <span>*</span></label>
        <input type="text" name="facebook_name" value="<?php echo $_POST['facebook_name'] ?>" placeholder="ex. https://www.facebook.com/Username" required>
    </div>


    <div class="max-width">
        <button type="submit" name="free_book_submited">ส่งข้อมูล</button>
    </div>

</form>
</div>

<?php

    handleAddress();
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

            echo "
        <script>
            jQuery('select ,input').val('');
            jQuery('#submitedSucess').fadeIn(900);
            jQuery('.bg_opacity').fadeIn(900);
        </script>
        ";
        }
    }

}

add_shortcode('free_books', 'free_books_form');