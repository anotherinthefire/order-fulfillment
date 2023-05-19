<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfcbde0c1dc7876f99b72b5bfd959228a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitfcbde0c1dc7876f99b72b5bfd959228a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfcbde0c1dc7876f99b72b5bfd959228a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfcbde0c1dc7876f99b72b5bfd959228a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
