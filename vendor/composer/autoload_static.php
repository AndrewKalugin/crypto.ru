<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitceef6532eb45081acf7880142e984388
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'components\\' => 11,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'components\\' => 
        array (
            0 => __DIR__ . '/../..' . '/components',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitceef6532eb45081acf7880142e984388::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitceef6532eb45081acf7880142e984388::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
