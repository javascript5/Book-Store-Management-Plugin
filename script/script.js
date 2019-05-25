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




})