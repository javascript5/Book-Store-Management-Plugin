jQuery(document).ready(function(){
    jQuery(".activation_button").each(function(){
        if(jQuery(this).attr("status") == 0){
            jQuery(this).addClass("btn btn-danger");
        }else{
            jQuery(this).addClass("btn btn-success");
        };
    });

    jQuery("#checkAll").click(function(){
        jQuery('input:checkbox').not(this).prop('checked', this.checked);
    });
    
    jQuery(".confirm_order_button").on('click', function(){
        disAppearConfirmAlert();
    });

    jQuery(".bg_opacity").on('click', function(){
        disAppearConfirmAlert();
    });

    jQuery('#myForm').on('submit', function(e){
        // e.preventDefault();
    })


    function disAppearConfirmAlert(){
        jQuery("#submitedSucess").fadeOut();
        jQuery(".bg_opacity").fadeOut();
    }

})