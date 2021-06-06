<?php
//The following function will make for Vietnam the state field as a required in woocommerce:
add_filter( 'woocommerce_get_country_locale', 'dlpwc_custom_country_locale', 10, 1 );
function dlpwc_custom_country_locale( $locale ) {
    $locale['VN']['state']['required'] = true;

    return $locale;
}
?>