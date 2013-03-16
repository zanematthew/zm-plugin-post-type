<?php

/**
 * Check if zM Easy Custom Post Types is installed. If it
 * is NOT installed we display an admin notice and stop
 * execution of this plugin, returning.
 */
if ( ! get_option('zm_easy_cpt_version' ) ){
    function zm_ev_admin_notice(){
        echo '<div class="updated"><p>This plugin requires <strong>zM Easy Custom Post Types</strong>.</p></div>';
    }
    add_action('admin_notices', 'zm_ev_admin_notice');
}

/**
 * Auto load our events.php, events_controller.php, etc.
 * and enqueue our admin and front end asset files.
 */
require_once plugin_dir_path( __FILE__ ) . '../zm-easy-cpt/plugin.php';
if ( ! function_exists( 'zm_easy_cpt_reqiure' ) ) return;
zm_easy_cpt_reqiure( plugin_dir_path(__FILE__) );