<?php
/** Change Calculating shipping form in Cart page */
add_filter( 'woocommerce_shipping_calculator_enable_postcode', 'ccs_ghtk4woo_disable_postcode_cart_page' ); // disable postcode
function ccs_ghtk4woo_disable_postcode_cart_page(){
    return false;
}

add_filter( 'woocommerce_shipping_calculator_enable_city', 'ccs_ghtk4woo_change_city_to_dropdown' );
function ccs_ghtk4woo_change_city_to_dropdown(){
?>
    <p class="form-row form-row-wide" id="calc_shipping_city_field"> 
        <select name="calc_shipping_city" id="calc_shipping_city" class="state-select" placeholder="<?php _e( 'Select an option', 'woocommerce' ); ?>">
        </select>
    </p> 
    
<?php
}
?>