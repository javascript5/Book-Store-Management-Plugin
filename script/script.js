jQuery(document).ready(function () {
    jQuery(".activation_button").each(function () {
        if (jQuery(this).attr("status") == 0) {
            jQuery(this).addClass("btn btn-danger");
        } else {
            jQuery(this).addClass("btn btn-success");
        };
    });

    jQuery("#checkAll").click(function () {
        jQuery('input:checkbox').not(this).prop('checked', this.checked);
    });

    jQuery(".confirm_order_button").on('click', function () {
        disAppearConfirmAlert();
    });

    jQuery(".bg_opacity").on('click', function () {
        disAppearConfirmAlert();
    });

    jQuery('#myForm').on('submit', function (e) {
        // e.preventDefault();
    })


    function disAppearConfirmAlert() {
        jQuery("#submitedSucess").fadeOut();
        jQuery(".bg_opacity").fadeOut();
    }


    var lang = jQuery('html').attr('lang');
    if (lang == "en-US") {
		jQuery('[name=free_book_submited]').text('Submit');
        jQuery('[name=sale_book_submited]').text('Submit');
        jQuery('[name=account_number]').attr('placeholder', "Please enter your account number");
        jQuery('#myForm > div > select > option').each(function () {
            var text = jQuery(this).text();
            switch (text) {
                case "เลือกโบรกเกอร์":
                    // code block
                    jQuery(this).html('Select Broker');
                    break;
                case "เลือกจังหวัด":
                    // code block
                    jQuery(this).html('Select Province');
                    break;
                case "เลือกอำเภอ":
                    // code block
                    jQuery(this).html('Select District');
                    break;
                default:
            }
        });
        jQuery('#myForm > div > label').each(function () {
            var text = jQuery(this).text();
            switch (text) {
                case "ชื่อจริง *":
                    // code block
                    jQuery(this).html('First Name <span>*</span>');
                    break;
                case "นามสกุล *":
                    // code block
                    jQuery(this).html('Last Name <span>*</span>');
                    break;
                case "โบรกเกอร์ *":
                    jQuery(this).html('Broker <span>*</span>');
                    break;
                case "จังหวัด *":
                    // code block
                    jQuery(this).html('Province <span>*</span>');
                    break;
                case "อำเภอ / เขต *":
                    // code block
                    jQuery(this).html('District <span>*</span>');
                    break;
                case "รหัสไปรษณีย์ *":
                    // code block
                    jQuery(this).html('ZIP Code <span>*</span>');
                    break;
                case "ที่อยู่ *":
                    // code block
                    jQuery(this).html('Address <span>*</span>');
                    break;
                case "เบอร์โทรศัพท์ *":
                    // code block
                    jQuery(this).html('Phone Number <span>*</span>');
                    break;
                case "อีเมล์ *":
                    // code block
                    jQuery(this).html('Email <span>*</span>');
                    break;
                case "Facebook Url ของท่าน *":
                    // code block
                    jQuery(this).html('Facebook Url <span>*</span>');
                    break;
                case "จำนวนหนังสือที่ต้องการสั่งซื้อ (เล่ม) *":
                    // code block
                    jQuery(this).html('Piece of book <span>*</span>');
                    break;
                case "เบอร์โทรศัพท์ (สำรอง)":
                    jQuery(this).html('Phone Number (2) <span>*</span>');
                    break;
                default:
                // code block
            }
        });
    }


})