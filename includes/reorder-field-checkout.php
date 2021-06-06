<?php 
/**
 * @description : Move / ReOrder Fields of Checkout Page
 * @hook : woocommerce_default_address_fields
 * @bug : just affecting on text field. With dropbox, the moving is not working. Do not know why?
 */
 
add_filter( 'woocommerce_default_address_fields', 'dlpwc_reorder_checkout_fields' );
function dlpwc_reorder_checkout_fields( $fields ) {
 
   // default priorities:
   // 'first_name' - 10
   // 'last_name' - 20
   // 'company' - 30
   // 'country' - 40
   // 'address_1' - 50
   // 'address_2' - 60
   // 'city' - 70
   // 'state' - 80
   // 'postcode' - 90
 
   $fields['address_1']['priority'] = 82;
   $fields['city']['priority'] = 81;
   
  return $fields;
}
?>