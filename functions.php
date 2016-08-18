<?php
/**
* Add the input field to the form
*
* @param int $form_id
* @param null|int $post_id
* @param array $form_settings
*/
function render_lang_select( $form_id, $post_id, $form_settings ) {
    $value = '';
 
    if ( $post_id ) {
        $value = get_post_meta( $post_id, 'lang', true );
    }
    ?>
 
    <div class="wpuf-label">
        <label>A demo field</label>
    </div>
 
    <div class="wpuf-fields" data-required="no" data-type="radio">
        
		
		 <label>
                    <input class="wpuf_lang_en_1161" name="lang" value="interface" <?php checked( $checked, $current, $echo ); ?> type="checkbox">
                        Inter­face
					</label>
                    
                    <label>
                        <input class="wpuf_lang_en_1161" name="lang" value="full_audio" <?php checked( $checked, $current, $echo ); ?> type="checkbox">
                        Full&nbsp;Audio&nbsp;
					</label>
                    
                    <label>
                        <input class="wpuf_lang_en_1161" name="lang" value="subtitles" <?php checked( $checked, $current, $echo ); ?> type="checkbox">
                        Sub­tit­les
					</label>
		
    </div>
    <?php
}

add_action( 'lang_select', 'render_lang_select', 10, 3 );


/**
 * Update the custom field when the form submits
 *
 * @param type $post_id
 */
function update_lang_select( $post_id ) {
    if ( isset( $_POST['lang'] ) ) {
        update_post_meta( $post_id, 'lang', $_POST['lang'] );
    }
}
 
add_action( 'wpuf_add_post_after_insert', 'update_lang_select' );
add_action( 'wpuf_edit_post_after_update', 'update_lang_select' );