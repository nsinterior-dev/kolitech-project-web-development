<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit99032efb31b54d465fc54a7aa7a76dad
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit99032efb31b54d465fc54a7aa7a76dad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit99032efb31b54d465fc54a7aa7a76dad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit99032efb31b54d465fc54a7aa7a76dad::$classMap;

        }, null, ClassLoader::class);
    }
}
