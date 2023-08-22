<?php

/**
 * @package  Variation Swatches WooCommrece
 */

namespace WP_WOO_VS\Admin;

class Settings {
    public function __construct() {
        add_filter('woocommerce_settings_tabs_array', array($this, 'add_variation_swatches_tab'), 50);

        add_action('woocommerce_settings_tabs_variation_swatches', array($this, 'variation_swatches_settings_tab'));

        add_action('woocommerce_update_options_variation_swatches', array($this, 'save_variation_swatches_settings'));
    }

    public function add_variation_swatches_tab($tabs) {
        $tabs['variation_swatches'] = __('Variation Swatches', 'variation-swatches-woocommerce');
        return $tabs;
    }

    public function variation_swatches_settings_tab() {
        woocommerce_admin_fields($this->get_variation_swatches_settings());
    }

    public function get_variation_swatches_settings() {
        return array(
            'section_title' => array(
                'name' => __('Variation Swatches Settings', 'variation-swatches-woocommerce'),
                'type' => 'title',
                'desc' => '',
                'id' => 'woocommerce_variation_swatches_section_title'
            ),
            'enable_swatches' => array(
                'name' => __('Enable Variation Swatches', 'variation-swatches-woocommerce'),
                'type' => 'checkbox',
                'desc' => __('Enable swatches for product variations', 'variation-swatches-woocommerce'),
                'id' => 'woocommerce_enable_variation_swatches'
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'woocommerce_variation_swatches_section_end'
            ),
        );
    }

    public function save_variation_swatches_settings() {
        woocommerce_update_options($this->get_variation_swatches_settings());
    }
}
