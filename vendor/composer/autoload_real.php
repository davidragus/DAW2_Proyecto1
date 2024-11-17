<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdfaed20f36ddf5ca2b653c4c0518c27f
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

        spl_autoload_register(array('ComposerAutoloaderInitdfaed20f36ddf5ca2b653c4c0518c27f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdfaed20f36ddf5ca2b653c4c0518c27f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdfaed20f36ddf5ca2b653c4c0518c27f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
