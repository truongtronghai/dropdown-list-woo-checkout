<?php 
// Change "city" checkout billing and shipping fields to a dropdown
add_filter( 'woocommerce_default_address_fields' , 'override_checkout_city_fields' );
function override_checkout_city_fields( $fields ) {

    // Define here in the array your desired cities (Here an example of cities)
    $option_cities = array(
         '' => __( 'Select an option', 'woocommerce' )
    );

    $fields['city']['type'] = 'select';
    $fields['city']['label'] = 'Province';
    $fields['city']['required'] = true;
    $fields['city']['options'] = $option_cities;

    
    return $fields;
}
?>