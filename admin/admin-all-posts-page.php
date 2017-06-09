<?php
/**
	* Add new column and Show Labur URL in labur URL Column
	* labur URL is the new column name
	*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
  * @wp-hook manage_posts_columns
	* Add new column
	* labur URL is the new column name
	*/
function set_labur_columns_head($defaults) {
    $defaults['labur_shortened_url'] = __('Labur URL', 'wp-labur');
    return $defaults;
}
add_filter('manage_posts_columns', 'set_labur_columns_head');


/**
  * @wp-hook manage_posts_custom_column
	* Show Labur URL in labur URL column
	*/
function set_labur_columns_content($column_name, $post_ID) {
    if ($column_name == 'labur_shortened_url') {
				$value = get_post_custom($post->ID); // Get post metadata
				$labur_link = esc_attr($value['labur_shortened_url'][0]); // Get labur_shortened_url value
        if ($labur_link) {
            echo $labur_link;
        }
    }
}
add_action('manage_posts_custom_column', 'set_labur_columns_content', 10, 2);

?>
