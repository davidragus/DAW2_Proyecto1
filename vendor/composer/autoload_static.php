<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdfaed20f36ddf5ca2b653c4c0518c27f
{
    public static $files = array (
        'd4e1e452276144642531a3f6cb2d82b6' => __DIR__ . '/../..' . '/config/config.php',
        '530687010661e52dd53e703b7a7cdc61' => __DIR__ . '/../..' . '/src/Helpers/assetsHelper.php',
        'c9ce731bae67f4567b8ff082302a93b9' => __DIR__ . '/../..' . '/src/Helpers/frontendHelper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdfaed20f36ddf5ca2b653c4c0518c27f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdfaed20f36ddf5ca2b653c4c0518c27f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdfaed20f36ddf5ca2b653c4c0518c27f::$classMap;

        }, null, ClassLoader::class);
    }
}
