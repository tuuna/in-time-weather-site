<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f2bd99bfc78cc92948cd4421e3c7b60
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8f2bd99bfc78cc92948cd4421e3c7b60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8f2bd99bfc78cc92948cd4421e3c7b60::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
