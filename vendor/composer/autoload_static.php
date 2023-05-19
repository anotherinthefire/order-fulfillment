<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfcbde0c1dc7876f99b72b5bfd959228a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfcbde0c1dc7876f99b72b5bfd959228a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfcbde0c1dc7876f99b72b5bfd959228a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfcbde0c1dc7876f99b72b5bfd959228a::$classMap;

        }, null, ClassLoader::class);
    }
}
