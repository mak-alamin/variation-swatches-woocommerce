<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita507f57bbc407de108d0bc90cac707f3
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WP_WOO_VS\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WP_WOO_VS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita507f57bbc407de108d0bc90cac707f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita507f57bbc407de108d0bc90cac707f3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita507f57bbc407de108d0bc90cac707f3::$classMap;

        }, null, ClassLoader::class);
    }
}