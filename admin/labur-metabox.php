<?php
/**
  * Create metabox & save meta_box data
  **/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/**
  * @wp-hook add_meta_boxes
	* Create metabox in post edit page
	*/
function labur_add_metabox() {
    //doc http://codex.wordpress.org/Function_Reference/add_meta_box
    add_meta_box('labur_url', esc_html(__('Labur', 'labur')),'labur_url_handler', 'post', 'side', 'high'); // id, title, The function that is executed when creating the box, element type.
}
add_action('add_meta_boxes', 'labur_add_metabox' );


/**
 * Metabox handler
 */
function labur_url_handler() {
    $value = get_post_custom($post->ID); // get post metadata
    $labur_link = esc_attr($value['labur_shortened_url'][0]); // Get labur_shortened_url value
    $post_uri = esc_url(get_post_permalink());

    echo '<input type="text" id="labur_shortened_url" name="labur_shortened_url"  value="'.$labur_link.'" readonly />';
    echo '<p class="submit"><input id="button_labur_get_url" class="button button-primary button-large" name="button_labur_get_url" value="'. esc_html(__('Create labur URL', 'labur')).'" type="button" /></p>';
}

/**
 * @wp-hook save_post
 * Save metabox metadata
 */
function labur_save_metabox($post_id) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      update_post_meta($post_id, 'labur_shortened_url', esc_url_raw($_POST['labur_shortened_url']));

    }

    // Check if user can edit post
    if( !current_user_can( 'edit_post' ) ) {
        return;
    }

    if( isset($_POST['labur_shortened_url'] )) {
        update_post_meta($post_id, 'labur_shortened_url', esc_url_raw($_POST['labur_shortened_url'])); // post id, Custom field name, data to insert. labur_shortened_url is imput element name
    }
}
add_action('save_post', 'labur_save_metabox' );

?>
