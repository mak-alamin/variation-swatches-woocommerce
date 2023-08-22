<?php

/**
 * @package  Variation Swatches WooCommrece
 */

namespace WP_WOO_VS\Base;

class Ajax
{
    public function register()
    {
        add_action('wp_ajax_get_swatches_color_code', [$this, 'get_swatches_color_code']);
        add_action('wp_ajax_nopriv_get_swatches_color_code', [$this, 'get_swatches_color_code']);
    }

    function get_swatches_color_code()
    {
        $colorName = isset($_REQUEST['color_name']) ? $_REQUEST['color_name'] : '';
        $term = get_term_by('slug', $colorName, 'pa_color');

        $color_code = '';

        if ($term) {
            $term_id = $term->term_id;
            $color_code = get_term_meta($term_id, 'pa_color_code', true);
        }

        wp_send_json($color_code);
    }
}
