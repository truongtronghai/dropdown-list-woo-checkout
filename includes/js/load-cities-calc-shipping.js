jQuery(document).ready(function($){
        
    $("#calc_shipping_state").change(function(){
        let province = {"province" : $(this).val()};
        $("#calc_shipping_city").empty();
        // ajax_object is an object was localized in main plugin file
        //console.log(ajax_object.ajax_url);
        $.post(ajax_object_calc_shipping.calc_shipping_ajax_url,province,function(result,status){ // call AJAX request with post method
            //alert(status);
            
            if(status === 'success'){
                let array_cities = JSON.parse(result);
                let opt_city;
                //alert(array_cities);
                for(let i = 0; i < array_cities.length; i++){
                    opt_city = $("<option></option>").attr("value",array_cities[i]).text(array_cities[i]); // create element with jQuery
                    $("#calc_shipping_city").append(opt_city);
                }
            }
            
        });
    });

});