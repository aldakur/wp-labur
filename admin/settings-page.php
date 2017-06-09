<?php
/**
  * Create Labur plugins settings page
  */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
  * @wp-hook admin_init
  * Add plugin admin settings
  */
function labur_admin_init() { // The fields to show in the settings page
  // When you use register_settings you are creating items to save. Fields to save
    register_setting('labur-group', 'labur_settings_api_key'); // Options group (required), title. How it is saved in databases. The prefix is important to save in databases. In this case, labur
		register_setting('labur-group', 'labur_settings_host');
}
add_action('admin_init', 'labur_admin_init');



/**
  * Show admin settings page
  */
function labur_plugin_options() { // Page design. This function is called in admin-menu.php
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Labur Wordpress Plugin</h2>
        <form action="<?php echo esc_url( admin_url('options.php') ); ?>" method="post">
            <?php settings_fields('labur-group'); ?>
            <?php @do_settings_fields('labur-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="labur_dashboard_title"><?php echo esc_html(__('API key', 'wp-labur')); ?></label></th>
                    <td>
                        <input type="text" name="labur_settings_api_key" id="labur_settings_api_key" value="<?php echo esc_attr(get_option('labur_settings_api_key')); // If a previous value exists, it shows it ?>" />
                        <br/><small><?php echo esc_html(__('You find the API key in your labur.eus dashboard ', 'wp-labur')); ?><a target="_blank" href="<?php echo esc_url('https://labur.eus/');?>">https://labur.eus/</a></small>
                    </td>
                </tr>
            </table> <?php @submit_button(); ?>
        </form>
    </div>
    <?php
}

?>
