<?php
namespace oowp\core;

/* Abstract static methods */
interface ISingleton {
    static function newInstance();
}

abstract class Singleton implements ISingleton{
    private static $instance;

    public final static function instance() {
        if (self::$instance === null) {
            // newInstance is implemented by the subclass
            // which is forced by the ISingletong interface
            self::$instance = static::newInstance();
        }

        return self::$instance;
    }
}
