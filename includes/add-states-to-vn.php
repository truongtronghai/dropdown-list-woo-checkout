<?php 
add_filter('woocommerce_states', 'dlpwc_add_states');
function dlpwc_add_states( $states ) {
    if( !isset($states['VN']))
        $states['VN'] = array();

    // template for state array
    // $states['VN'] = array(
    //     'sample' => 'sample text'
    // );
    $json_string = file_get_contents(plugin_dir_path(__FILE__)."countries/VN/states.json"); // read whole file to string
    
    $states['VN'] = json_decode($json_string,true);
    
    return $states;
}

?>