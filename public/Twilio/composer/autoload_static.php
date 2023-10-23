<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8df1e7be8c2a463ca95aa978d13a7973
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8df1e7be8c2a463ca95aa978d13a7973::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8df1e7be8c2a463ca95aa978d13a7973::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8df1e7be8c2a463ca95aa978d13a7973::$classMap;

        }, null, ClassLoader::class);
    }
}