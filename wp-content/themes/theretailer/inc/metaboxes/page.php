<?php

//-------------------------------------------------------------------
// Create
//-------------------------------------------------------------------
add_action( 'add_meta_boxes', 'page_options_meta_box_add' );
function page_options_meta_box_add() {
    global $post;

    if( !empty($post) ) {
        $page_template = get_post_meta($post->ID, '_wp_page_template', true);

        if ( ( 'default' == $page_template ) || ( 'page.php' == $page_template ) || ( '' == $page_template ) || ( 'page-with_sidebar.php' == $page_template ) || ( 'page-with_left_sidebar.php' == $page_template ) ) {
            add_meta_box( 'page_options_meta_box', 'Page Options', 'page_options_meta_box_content', 'page', 'side', 'high' );
        }
    }
}

function page_options_meta_box_content() {
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $page_header_check = isset($values['page_header_meta_box_check']) ? esc_attr($values['page_header_meta_box_check'][0]) : 'on';
    $page_title_check = isset($values['page_title_meta_box_check']) ? esc_attr($values['page_title_meta_box_check'][0]) : 'on';
	$page_light_footer_check = isset($values['page_light_footer_meta_box_check']) ? esc_attr($values['page_light_footer_meta_box_check'][0]) : 'on';
    $page_dark_footer_check = isset($values['page_dark_footer_meta_box_check']) ? esc_attr($values['page_dark_footer_meta_box_check'][0]) : 'on';
    ?>

    <p>
        <input type="checkbox" id="page_header_meta_box_check" name="page_header_meta_box_check" <?php checked( $page_header_check, 'on' ); ?> />
        <label for="page_header_meta_box_check">Show Header</label>
    </p>

    <p>
        <input type="checkbox" id="page_title_meta_box_check" name="page_title_meta_box_check" <?php checked( $page_title_check, 'on' ); ?> />
        <label for="page_title_meta_box_check">Show Page Title</label>
    </p>

    <p>
        <input type="checkbox" id="page_light_footer_meta_box_check" name="page_light_footer_meta_box_check" <?php checked( $page_light_footer_check, 'on' ); ?> />
        <label for="page_light_footer_meta_box_check">Show Light Footer</label>
    </p>

    <p>
        <input type="checkbox" id="page_dark_footer_meta_box_check" name="page_dark_footer_meta_box_check" <?php checked( $page_dark_footer_check, 'on' ); ?> />
        <label for="page_dark_footer_meta_box_check">Show Dark Footer</label>
    </p>

    <?php

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'page_options_meta_box', 'page_options_meta_box_nonce' );
}

//-------------------------------------------------------------------
// Save
//-------------------------------------------------------------------
add_action( 'save_post', 'page_options_meta_box_save' );
function page_options_meta_box_save($post_id) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['page_options_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['page_options_meta_box_nonce'], 'page_options_meta_box' ) ) return;

    // if our current user can't edit this post, bail
    if ( !current_user_can( 'edit_post', $post_id ) ) return;

    $page_header_chk = isset($_POST['page_header_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'page_header_meta_box_check', $page_header_chk );

    $page_title_chk = isset($_POST['page_title_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'page_title_meta_box_check', $page_title_chk );

	$page_light_footer_chk = isset($_POST['page_light_footer_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'page_light_footer_meta_box_check', $page_light_footer_chk );

    $page_dark_footer_chk = isset($_POST['page_dark_footer_meta_box_check']) ? 'on' : 'off';
    update_post_meta( $post_id, 'page_dark_footer_meta_box_check', $page_dark_footer_chk );
}
