<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit191b5bc21ac676ac9077cb8c75ddf5a0
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
        '06dd8487319ccd8403765f5b8c9f2d61' => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Mongo/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
        ),
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
        'J' => 
        array (
            'Jean85\\' => 7,
        ),
        'A' => 
        array (
            'Alcaeus\\MongoDbAdapter\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
        'Jean85\\' => 
        array (
            0 => __DIR__ . '/..' . '/jean85/pretty-package-versions/src',
        ),
        'Alcaeus\\MongoDbAdapter\\' => 
        array (
            0 => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Alcaeus/MongoDbAdapter',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mongo' => 
            array (
                0 => __DIR__ . '/..' . '/alcaeus/mongo-php-adapter/lib/Mongo',
            ),
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit191b5bc21ac676ac9077cb8c75ddf5a0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit191b5bc21ac676ac9077cb8c75ddf5a0::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit191b5bc21ac676ac9077cb8c75ddf5a0::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit191b5bc21ac676ac9077cb8c75ddf5a0::$classMap;

        }, null, ClassLoader::class);
    }
}
