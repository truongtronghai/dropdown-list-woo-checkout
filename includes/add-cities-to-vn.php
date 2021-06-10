<?php 
// Change "city" checkout billing and shipping fields to a dropdown
add_filter( 'woocommerce_default_address_fields' , 'override_checkout_city_fields' );
function override_checkout_city_fields( $fields ) {
    
    // Define here in the array your desired cities (Here an example of cities)
    $option_cities = array(
        '' => ''
    );

    $fields['city']['type'] = 'select';
    $fields['city']['label'] = __('Town / District','woocommerce');
    $fields['city']['required'] = true;
    $fields['city']['options'] = $option_cities;

    
    return $fields;
}
?>