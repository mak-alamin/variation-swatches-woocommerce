<?php

/**
 * @package  Variation Swatches WooCommrece
 */

 namespace WP_WOO_VS\Admin;

class CustomFields {
    public function __construct() {
        add_action('pa_color_add_form_fields', array($this, 'add_pa_color_color_code_field'));

        add_action('pa_color_edit_form_fields', array($this, 'edit_pa_color_color_code_field'));

        add_action('edited_pa_color', array($this, 'save_pa_color_color_code_field'));

        add_action('create_pa_color', array($this, 'save_pa_color_color_code_field'));
    }

    public function add_pa_color_color_code_field() {
        ?>
        <div class="form-field term-color-code-wrap">
            <label for="pa_color_code"><?php _e('Color Code', 'variation-swatches-woocommerce'); ?></label>
            <input type="text" id="pa_color_code" name="pa_color_code" class="regular-text" />
            <p><?php _e('Enter the color code (e.g., #FF0000) associated with this attribute term.', 'variation-swatches-woocommerce'); ?></p>
        </div>
        <?php
    }

    public function edit_pa_color_color_code_field($term) {
        $color_code = get_term_meta($term->term_id, 'pa_color_code', true);
        ?>
        <tr class="form-field term-color-code-wrap">
            <th scope="row"><label for="pa_color_code"><?php _e('Color Code', 'variation-swatches-woocommerce'); ?></label></th>
            <td>
                <input type="text" id="pa_color_code" name="pa_color_code" class="regular-text" value="<?php echo esc_attr($color_code); ?>" />
                <p class="description"><?php _e('Enter the color code (e.g., #FF0000) associated with this attribute term.', 'variation-swatches-woocommerce'); ?></p>
            </td>
        </tr>
        <?php
    }

    public function save_pa_color_color_code_field($term_id) {
        if (isset($_POST['pa_color_code'])) {
            update_term_meta($term_id, 'pa_color_code', sanitize_text_field($_POST['pa_color_code']));
        }
    }
}
