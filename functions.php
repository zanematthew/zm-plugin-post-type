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


/**
 * Displays most recently added plugins
 */
function zm_plugin_post_type_latest(){

    $args = array(
        'post_type' => 'plugins',
        'numberposts' => 5,
        );

    $plugins = get_posts( $args );
    ?>
    <h4>Latest Plugins</h4>
    <ul class="zm-plugin-post-type-latest">
        <?php foreach( $plugins as $plugin ) : setup_postdata( $plugin ); ?>
            <li><a href="<?php print get_permalink( $plugin->ID ); ?>" title="<?php print get_the_title( $plugin->ID ); ?>"><?php print get_the_title( $plugin->ID ); ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php }