<?php
function sale_books_form($atts)
{
    ?>

<div class="sale_book_id book_tab" style="display:none">
<form method="post" action="<?php echo  get_permalink($page_id); ?>" class="book_form animated bounceInUp">
	<div class="browser_tab">
        <div class="circle_wrapper">
            <div class="circle green"></div>
            <div class="circle red"></div>
            <div class="circle yellow"></div>
        </div>
    </div>
    <div>
        <label>ชื่อจริง <span>*</span></label>
        <input type="text" name="firstname" required>
    </div>

    <div>
        <label>นามสกุล <span>*</span></label>
        <input type="text" name="lastname" required>
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
        <input type="text" name="place" value="<?php echo $_POST['place'] ?>" required/>
    </div>

    <div class="max-width">
        <label>เบอร์โทรศัพท์ <span>*</span></label>
        <input type="text" name="tel" required>
    </div>

    <div class="max-width">
        <label>เบอร์โทรศัพท์ (สำรอง)</label>
        <input type="text" name="backup_tel">
    </div>

    <div class="max-width">
        <label>อีเมล์ <span>*</span></label>
        <input type="email" name="email" required>
    </div>


    <div class="max-width">
        <button type="submit" name="sale_book_submited">ส่งข้อมูล</button>
    </div>
</form>
</div>
<?php
handleAddress();
    if (isset($_POST['sale_book_submited'])) {
        $table_name = "wp_sale_books";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $province = $_POST['province'];
        $amphoe = $_POST['amphoe'];
        $zip_code = $_POST['zip_code'];
        $place = $_POST['place'];
        $tel = $_POST['tel'];
        $backup_tel = $_POST['backup_tel'];
        $email = $_POST['email'];

        $sql = $GLOBALS['wpdb']->insert($table_name, array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "province" => $province,
            "amphoe" => $amphoe,
            "zip_code" => $zip_code,
            "place" => $place,
            "email" => $email,
            "tel" => $tel,
            "backup_tel" => $backup_tel,
            "status" => false,
        ));

        echo "
        <script>
            jQuery('#submitedSucess').fadeIn(900);
            jQuery('.bg_opacity').fadeIn(900);
        </script>
        ";

    }

}
add_shortcode('sale_books', 'sale_books_form');