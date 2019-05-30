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


    var lang = $(html).attr('lang'); 
    if(lang == "en-US"){
    $('#myForm > div > label').each(function () {
        var text = $(this).text();
        switch (text) {
            case "ชื่อจริง *":
                // code block
                $(this).html('First Name <span>*</span>');
                break;
            case "นามสกุล *":
                // code block
                $(this).html('Last Name <span>*</span>');
                break;
            case "จังหวัด *":
                // code block
                $(this).html('Province <span>*</span>');
                break;
            case "อำเภอ / เขต *":
                // code block
                $(this).html('District <span>*</span>');
                break;
            case "รหัสไปรษณีย์ *":
                // code block
                $(this).html('ZIP Code <span>*</span>');
                break;
            case "ที่อยู่ *":
                // code block
                $(this).html('Address <span>*</span>');
                break;
            case "เบอร์โทรศัพท์ *":
                // code block
                $(this).html('Phone Number <span>*</span>');
                break;
            case "อีเมล์ *":
                // code block
                $(this).html('Email <span>*</span>');
                break;
            case "Facebook Url ของท่าน *":
                // code block
                $(this).html('Facebook Url <span>*</span>');
                break;
            case "จำนวนหนังสือ *":
                // code block
                $(this).html('Piece <span>*</span>');
                break;
            case "เบอร์โทรศัพท์ (สำรอง)":
                $(this).html('Phone Number (2) <span>*</span>');
                break;
            default:
            // code block
        }
    });
    }


})