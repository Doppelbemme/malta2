<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita22c62828c8977b034d5311399985132
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita22c62828c8977b034d5311399985132::$classMap;

        }, null, ClassLoader::class);
    }
}
