<?php
/*
 * Plugin Name:       GLPay Plugin
 * Plugin URI:        https://glpay.legrandsoft.com/wp-glpay-plugin/update/
 * Description:       Collect mobile wallets payments in central and west Africa.
 * Version:           1.0.0
 * Author:            Groupe legrandsoft
 * Author URI:        https://legrandsoft.com/
 * Update URI:        https://glpay.legrandsoft.com/wp-glpay-plugin/update/
 */


/**
 * Activation function
 */ 
function glpay_activate() {
    $glpayApiToken = get_option("glpay-plugin-api-token", $default = null);
    if ($glpayApiToken==null) {
        add_option("glpay-plugin-api-token", "YOUR_GLPAY_API_TOKEN");
    }
    $glpayActive = get_option("glpay-plugin-active", $default = null);
    if ($glpayActive==null) {
        add_option("glpay-plugin-active", true);
    } else {
        update_option("glpay-plugin-active", true);
    }
    glpay_render_admin_options_menu();
}

/**
 * Deactivation function
 */ 
function glpay_desactivate() {
    update_option("glpay-plugin-active", false);
    glpay_render_admin_options_menu();
}

/**
 * Uninstall function
 */
function glpay_uninstall() {
    delete_option("glpay-plugin-api-token");
    delete_option("glpay-plugin-active");
}

function glpay_render_admin_options_menu() {
    $glpayActive = get_option("glpay-plugin-active", $default = null);
    if ($glpayActive==null) {
        remove_menu_page( plugin_dir_path(__FILE__) . 'views/admin-page.php' );
    } else {
        add_menu_page(
            'GLPay',
            'GLPay Options',
            'manage_options',
            plugin_dir_path(__FILE__) . 'views/admin-page.php',
            null,
            "dashicons-money-alt",
            20
        );
    }
}

// Register hooks
register_activation_hook(__FILE__, "glpay_activate");
register_deactivation_hook(__FILE__, "glpay_desactivate");
register_uninstall_hook(__FILE__, "glpay_uninstall");

// Administration page
add_action( 'admin_menu', 'glpay_render_admin_options_menu' );
?>