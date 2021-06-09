<?php
/**
 * Plugin Name:       Dropdown list woo checkout
 * Plugin URI:        
 * Description:       Making states, cities change into list rather than text input
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            CaChepSo Ltd
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dropdown_list_places_woo_checkout
 * Domain Path:       
 */

//Prevent Data Leaks.Add this line of code after the opening PHP tag in each PHP file:
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

load_plugin_textdomain('dropdown_list_places_woo_checkout'); // using for transaltion. Location of translation: wp-content/languages/plugins/dropdown_list_places_woo_checkout-vi.mo

/** Check dependency plugin */
if(!in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )){  
    $message = (__( 'Reason: Woocommerce plugin is not ready!!!'));
    printf("<div class='error notice-error notice is-dismissible'><p>%s</p></div>",$message);
    exit;
}

include(plugin_dir_path(__FILE__)."/includes/add-states-to-vn.php");   

include(plugin_dir_path(__FILE__)."/includes/add-cities-to-vn.php"); 

include(plugin_dir_path(__FILE__)."/includes/state-field-required-vn.php");    

include(plugin_dir_path(__FILE__)."/includes/reorder-field-checkout.php");

include(plugin_dir_path(__FILE__)."/includes/calc-shipping-form-cart-page.php");

/** Add JS script to footer */
add_action('wp_footer','dlpwc_add_script_to_footer');
function dlpwc_add_script_to_footer(){
    
    wp_enqueue_script( 'load-cities-ajax', plugin_dir_url(__FILE__)."/includes/js/load-cities.js"); // handle will be used in localize
    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.text_select_one
    wp_localize_script( 'load-cities-ajax', 'ajax_object',array( 
        'ajax_url' => plugin_dir_url(__FILE__)."includes/get-cities-on-province.php",
        'text_select_one' => __( 'Select an option', 'woocommerce' )
        ) );
    
    /** Change Calculating shipping form in Cart page */
    wp_enqueue_script( 'load-cities-ajax-calc-shipping', plugin_dir_url(__FILE__)."/includes/js/load-cities-calc-shipping.js"); // handle will be used in localize
    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.text_select_one
    wp_localize_script( 'load-cities-ajax-calc-shipping', 'ajax_object_calc_shipping',array( 
        'calc_shipping_ajax_url' => plugin_dir_url(__FILE__)."includes/get-cities-on-province.php"
        ) );
}    
