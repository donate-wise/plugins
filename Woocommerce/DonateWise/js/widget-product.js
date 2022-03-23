jQuery(document).ready(function($) {
    $(".switch input").click(function(){

        var id = $(this).attr('id');
        var checkbox = $('#'+id).is(":checked") ? 1 : 0;
        jQuery.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {action: "save_switch", checked: checkbox, name: id},
        }).done(function(){
        }).fail(function(error){
            console.log(error);
            $('#'+id).prop('checked', !checkbox);
        });
    })
});


jQuery(document).ready(function($) {
	function openModal_widget_product(){
	    document.getElementById('widget_donateWise--popup').style.display = "flex";
	    document.getElementById('widget_donateWise--popup').style.visibility = "visible";
	}
	function closeModal_widget_product(){
	    document.getElementById('widget_donateWise--popup').style.display = "none";
	    document.getElementById('widget_donateWise--popup').style.visibility = "hidden";
	}   

    jQuery('#donatewise_widget_product--more').click(function(){
        openModal_widget_product();
    });

    jQuery('#widget_donateWise--popup-close').click(function(){
        closeModal_widget_product();
    });

});



jQuery(document).ready(function($) {
    function openModal_widget_floating(){
        document.getElementById('widget_donateWise_floating--popup').style.display = "flex";
        document.getElementById('widget_donateWise_floating--popup').style.visibility = "visible";
    }

    function closeModal_widget_floating(){
        document.getElementById('widget_donateWise_floating--popup').style.display = "none";
        document.getElementById('widget_donateWise_floating--popup').style.visibility = "hidden";
    }

    jQuery('#donatewise_widget_floating').click(function(){
        openModal_widget_floating();
    });

    jQuery('#widget_donateWise_floating--popup-close').click(function(){
        closeModal_widget_floating();
    });
});

jQuery(document).ready(function($) {
    jQuery(document).scroll(function(){
        if(jQuery('#donatewise_widget_floating').length >= 1){
            if(jQuery(document).scrollTop() > 600)
            jQuery('#donatewise_widget_floating').addClass('floating-hidden');
        else
            jQuery('#donatewise_widget_floating').removeClass('floating-hidden');
        }
        
    });
});


