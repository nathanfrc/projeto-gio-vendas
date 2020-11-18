<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ce92eccd693955bc100304768dfcf21
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ce92eccd693955bc100304768dfcf21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ce92eccd693955bc100304768dfcf21::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3ce92eccd693955bc100304768dfcf21::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
