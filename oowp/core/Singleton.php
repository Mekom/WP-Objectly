<?php
namespace oowp\core;

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
