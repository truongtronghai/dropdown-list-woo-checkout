jQuery(document).ready(function($){
    
    //$("#billing_city").attr("data-placeholder",ajax_object.text_select_one); // initializing
    //$("#shipping_city").attr("data-placeholder",ajax_object.text_select_one); // initializing

    $("#billing_state").change(function(){
        let province = {"province" : $(this).val()};
        // clear the select box of cities
        $("#billing_city").empty();

        // ajax_object is an object was localized in main plugin file
        //console.log(ajax_object.ajax_url);
        $.post(ajax_object.ajax_url,province,function(result,status){ // call AJAX request with post method
            //alert(status);
            
            if(status === 'success'){
                let array_cities = JSON.parse(result);
                let opt_city;
                //alert(array_cities);
                for(let i = 0; i < array_cities.length; i++){
                    opt_city = $("<option></option>").attr("value",array_cities[i]).text(array_cities[i]); // create element with jQuery
                    $("#billing_city").append(opt_city);
                }
            }
            
        });
    });

    /**
     * This will automatically call all the subsequent AJAX calls needed to refresh the cart information, including the order review.
     * It will refresh whole page. If there is not code below, page will not re-calculate the shipping code when billing_city or shipping_city change.
     * https://stackoverflow.com/questions/27635186/update-order-review-on-button-click
     * In Checkout page:
        jQuery(document.body).trigger("update_checkout")
     * In Cart page:
        jQuery(document.body).trigger("wc_update_cart");
     * !VERY IMPORTANT!
     */
    $("#billing_city").change(function(){
        jQuery(document.body).trigger("update_checkout");
    });

    $("#shipping_city").change(function(){
        jQuery(document.body).trigger("update_checkout");
    });

    $("#shipping_state").change(function(){
        let province = {"province" : $(this).val()};
        // clear the select box of cities
        $("#shipping_city").empty();

        // ajax_object is an object was localized in main plugin file
        //console.log(ajax_object.ajax_url);
        $.post(ajax_object.ajax_url,province,function(result,status){ // call AJAX request with post method
            //alert(status);
            
            if(status === 'success'){
                let array_cities = JSON.parse(result);
                let opt_city;
                //alert(array_cities);
                for(let i = 0; i < array_cities.length; i++){
                    opt_city = $("<option></option>").attr("value",array_cities[i]).text(array_cities[i]); // create element with jQuery
                    $("#shipping_city").append(opt_city);
                }
            }
            
        });
        
    });

});
