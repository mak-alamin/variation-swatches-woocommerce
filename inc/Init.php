<?php

/**
 * @package  Variation Swatches WooCommrece
 */

namespace WP_WOO_VS;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function getServices()
    {
        return [
            Base\Assets::class,
            Base\Ajax::class,
            Admin\Settings::class,
            Admin\CustomFields::class,
            Frontend\Variation_Swatches::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return
     */
    public static function registerServices()
    {
        foreach (self::getServices() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param  class $class    class from the services array
     * @return class instance  new instance of the class
     */
    private static function instantiate($class)
    {
        $service = new $class();

        return $service;
    }
}