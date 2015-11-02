<?php
namespace oowp\core;

use ReflectionClass;
use InvalidArgumentException;

class Enum {
    private static $variables = array();
        // $inited
        // $reflection
        // $constants
        // $values

    private $value;

    /* ------------------------- */
    /* # ENUM STATIC INTERFACE # */
    /* ------------------------- */

    private static function className() {
        return get_called_class();
    }

    private static function setClassVariable($variable, $value) {
        $class = static::className();

        if (!isset(self::$variables[$class]))
            self::$variables[$class] = array();

        self::$variables[$class][$variable] = $value;
    }

    private static function getClassVariable($variable) {
        $class = static::className();

        if (!isset(self::$variables[$class]))
            return null;

        if (!isset(self::$variables[$class][$variable]))
            return null;

        return self::$variables[$class][$variable];
    }

    protected static function init() {
        $reflection = new ReflectionClass(static::className());
        static::setClassVariable('reflection', $reflection);

        $constants = $reflection->getConstants();
        static::setClassVariable('constants', $constants);

        $values = array_unique(array_values($constants));
        static::setClassVariable('values', $values);

        static::setClassVariable('inited', true);
    }

    /* -------------------- */
    /* # STATIC INTERFACE # */
    /* -------------------- */

    /**
     * Get an array of possible values in this enum
     *
     * @return array An array of possible values
     */
    public static function getValues() {
        static::init();
        return static::getClassVariable('values');
    }

    public static function getValueForConstant($constant) {
        if (!static::hasConstant($constant)) {
            throw new InvalidArgumentException(
                "Invalid constant for enum " . static::className()
            );
        } else {
            $constants = static::getClassVariable('constants');
            return $constants[$constant];
        }
    }

    /**
     * Get the constant in this enum
     *
     * @return array An array of the constants
     */
    public static function getConstants() {
        static::init();
        return array_keys(static::getClassVariable('constants'));
    }

    /**
     * Check if this enum has a constant
     *
     * @return bool True if it does, false it it dosent
     */
    public static function hasConstant($constant) {
        static::init();
        $constants = static::getClassVariable('constants');
        return isset($constants[$constant]);
    }

    /**
     * Check if this enum has a constant
     *
     * @return bool True if it does, false it it dosent
     */
    public static function hasValue($value) {
        static::init();
        $values = static::getClassVariable('values');
        return array_search($value, $values) !== false;
    }

    /* ---------------------- */
    /* # INSTANCE INTERFACE # */
    /* ---------------------- */

    /**
     * Description
     *
     * @param mixed $value
     */
    public final function __construct() {
        // Init the enum, if not allready
        self::init(__CLASS__);

        // If no argument was passed
        // the default value is assumed
        // if one is defined
        if (func_num_args() === 0) {
            try {
                $this->value = self::getValueForConstant("__default");
            } catch (InvalidArgumentException $e) {
                throw new InvalidArgumentException(
                    $this->className() . " does not spesify a default value, and must" .
                    " therefor recive a valid value in its constructor"
                );
            }
        } else {
            $this->value = func_get_arg(0);
            if (!static::hasValue($this->value)) {
                throw new InvalidArgumentException(
                    "Value \"" . $this->value . "\" is not a valid value for enum " .
                    static::className()
                );
            }
        }
    }

    public function getValue() {
        return $this->value;
    }
}