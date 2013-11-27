<?php
/**
 * A test for the validator abstract class.
 *
 * @package HylianShield
 * @subpackage Test
 * @copyright 2013 Jan-Marten "Joh Man X" de Boer
 */

namespace Tests\HylianShield;

/**
 * ValidatorTest.
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
    * Test the validate and invoke method
    */
    public function testValidate()
    {
        $stub = $this->getMockForAbstractClass(
            // Original class name.
            '\HylianShield\Validator',
            // Arguments for the constructor.
            array(),
            // Mocked class name.
            'CustomValidator',
            // Call original constructor.
            false,
            // Call original clone.
            false,
            // Call autoload.
            true,
            // Mocked methods.
            array('validate'),
            // Clone arguments.
            false
        );

        $stub->expects($this->atLeastOnce())
            ->method('validate')
            ->will($this->returnValue(true));

        $this->assertTrue($stub->validate('something'));
        $this->assertTrue($stub('something else'));
    }

    /**
     * Test what happens if an invalid validator was set.
     *
     * @expectedException \LogicException
     */
    public function testInvalidValidator()
    {
        // Simply get an implementation of the Validator class.
        $stub = $this->getMockBuilder('\HylianShield\Validator')
            ->setMethods(null)
            ->getMock();

        // It should throw, since there is no validator set.
        $stub('go throw an exception if you can');
    }

    /**
     * Test what happens if an invalid type was set.
     *
     * @expectedException \LogicException
     */
    public function testInvalidType()
    {
        // Simply get an implementation of the Validator class.
        $stub = $this->getMockBuilder('\HylianShield\Validator')
            ->setMethods(null)
            ->getMock();

        // It should throw, since there is no type set.
        $stub->type();
    }

}
