<?php
/**
  * Add settings link for Labur plugin in plugins page
  * | Deactive | Settings |
  */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
  * @wp-hook plugin_action_links_$plugin
  * Add settings link for Labur plugin in plugins page
  * | Deactive | Settings |
  */
function labur_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=labur">' . esc_html(__( 'Settings', 'wp-labur' )) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}





 ?>
