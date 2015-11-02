<?php
namespace oowp\tests\tests\post;

use InvalidArgumentException;

use oowp\core\Enum;
use oowp\tests\OOWPTestCase;

class MyEnum extends Enum {
    const ONE   = 1;
    const TWO   = 2;
    const THREE = 3;
    const ALSO_TWO = 2;
}

class MyEnumWithDefault extends Enum {
    const __default = self::TWO;

    const ONE   = 1;
    const TWO   = 2;
    const THREE = 3;
}

class EnumTest extends OOWPTestCase {

    public function testDefaultValue() {
        $defaultValue = new MyEnumWithDefault();
        $this->assertEquals(
            2,
            $defaultValue->getValue()
        );
    }

    public function testNoParamOnNonDefaultableEnum() {
        $this->setExpectedException('InvalidArgumentException');
        $value = new MyEnum();
    }

    public function testWrongValue() {
        $this->setExpectedException('InvalidArgumentException');
        new MyEnum(4);
    }

    public function testCompare() {
        $enum1 = new MyEnum(MyEnum::ONE);
        $enum2 = new MyEnum(MyEnum::ONE);

        $this->assertTrue(
            $enum1->getValue() == $enum2->getValue()
        );

        $this->assertTrue(
            $enum1->getValue() === $enum2->getValue()
        );
    }

    public function testGetConstants() {
        $this->assertEquals(
            array(
                'ONE',
                'TWO',
                'THREE',
                'ALSO_TWO',
            ),
            MyEnum::getConstants()
        );
    }

    public function testGetValues() {
        $this->assertEquals(
            array(
                1,
                2,
                3
            ),
            MyEnum::getValues()
        );
    }

    public function testExceptionIsThrownOnInvalidValueForGetValue() {
        $this->setExpectedException('InvalidArgumentException');
        MyEnum::getValueForConstant('DOES NOT EXIST');
    }

    public function testHasConstant() {
        $this->assertTrue(MyEnum::hasConstant('TWO'));
        $this->assertFalse(MyEnum::hasConstant('DOES NOT EXIST'));
    }
}
