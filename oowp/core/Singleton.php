<?php
namespace oowp\core;

abstract class Singleton {
    private static $instance;

    public final static function instance() {
        if (self::$instance === null) {
            // newInstance is implemented by the subclass
            // which is forced by the ISingletong interface
            self::$instance = static::newInstance();
        }

        return self::$instance;
    }

    /**
     * Override this method to customize how the first instance is created
     *
     * @return any The instance
     */
    public static function newInstance() {
        return new static();
    }
}
