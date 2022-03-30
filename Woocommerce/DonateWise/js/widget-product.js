if( document.readyState !== 'loading' ) {
    donateWise_modal_product();
    donateWise_switch();
    donateWise_modal_floating();
    donateWise_scroll();
} else {
    document.addEventListener('DOMContentLoaded', function () {
        donateWise_modal_product();
        donateWise_switch();
        donateWise_modal_floating();
        donateWise_scroll();
    });
}

function donateWise_switch(){
    jQuery(".switch input").click(function(){
        var id = jQuery(this).attr('id');
        var checkbox = jQuery('#'+id).is(":checked") ? 1 : 0;
        jQuery.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {action: "save_switch", checked: checkbox, name: id},
        }).done(function(){
        }).fail(function(error){
            console.log(error);
            jQuery('#'+id).prop('checked', !checkbox);
        });
    });
}
    
function openModal_widget_product(){
    document.getElementById('widget_donateWise--popup').style.display = "flex";
    document.getElementById('widget_donateWise--popup').style.visibility = "visible";
}
function closeModal_widget_product(){
    document.getElementById('widget_donateWise--popup').style.display = "none";
    document.getElementById('widget_donateWise--popup').style.visibility = "hidden";
}  


function donateWise_modal_product(){
    jQuery('#donatewise_widget_product--more').click(function(){
        openModal_widget_product();
    });

    jQuery('#widget_donateWise--popup-close').click(function(){
        closeModal_widget_product();
    });

    jQuery(document).click(function(event) {
        if(document.getElementById('widget_donateWise--popup') && document.getElementById('widget_donateWise--popup').style.display == "flex"){
            if (!jQuery(event.target).closest(".widget_donateWise--popup-content").length && !jQuery(event.target).closest(".donatewise_widget_product--more").length) {
                closeModal_widget_product();
            }
        }
    });
}
	 


function openModal_widget_floating(){
    document.getElementById('widget_donateWise_floating--popup').style.display = "flex";
    document.getElementById('widget_donateWise_floating--popup').style.visibility = "visible";
}

function closeModal_widget_floating(){
    document.getElementById('widget_donateWise_floating--popup').style.display = "none";
    document.getElementById('widget_donateWise_floating--popup').style.visibility = "hidden";
}


function donateWise_modal_floating(){
    jQuery('#donatewise_widget_floating').click(function(){
        openModal_widget_floating();
    });

    jQuery('#widget_donateWise_floating--popup-close').click(function(){
        closeModal_widget_floating();
    });

    jQuery(document).click(function(event) {
        if(document.getElementById('widget_donateWise_floating--popup') && document.getElementById('widget_donateWise_floating--popup').style.display == "flex"){
            if (!jQuery(event.target).closest(".widget_donateWise--popup-content").length && !jQuery(event.target).closest(".donatewise_widget_floating--container").length) {
                closeModal_widget_floating();
            }
        }
    });
}

function donateWise_scroll(){
    jQuery(document).scroll(function(){
        if(jQuery('#donatewise_widget_floating').length >= 1){
            if(jQuery(document).scrollTop() > 600)
            jQuery('#donatewise_widget_floating').addClass('floating-hidden');
        else
            jQuery('#donatewise_widget_floating').removeClass('floating-hidden');
        }
        
    });
}



