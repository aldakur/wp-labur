<?php

// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

// Delete_option( 'plugin_option_name' );
delete_option('labur_settings_host');
delete_option('labur_settings_api_key');


// Delete specific meta datas. For example labur_shortened_url in post_type=post
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
    'post_status' => 'any'
);
$posts = get_posts( $args );

foreach( $posts as $post ) {
    delete_post_meta( $post->ID, 'labur_shortened_url' );
}
