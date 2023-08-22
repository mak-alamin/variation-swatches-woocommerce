<?php

/**
 * @package  Variation Swatches WooCommrece
 */

namespace WP_WOO_VS\Base;

class Assets
{
    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_frontend_scripts']);

        add_action('admin_enqueue_scripts', [$this, 'register_admin_scripts']);
    }

    public function register_frontend_scripts()
    {
        $enable_swatches = get_option('woocommerce_enable_variation_swatches');

        if('no' == $enable_swatches){
            return;
        }
        
        wp_register_style('frontend-main', WP_WOO_VS_ASSETS . '/css/main.css', null, time(), 'all');

        wp_enqueue_style('frontend-main');

        wp_register_script('frontend-main', WP_WOO_VS_ASSETS . '/js/main.js', array('jquery'), time(), true);

        wp_enqueue_script('frontend-main');

        wp_localize_script('frontend-main', 'WPWooVsData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));

    }

    public function register_admin_scripts($hook)
    {
        
    }
}