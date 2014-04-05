<?php
/**
 * Test for \HylianShield\Validator\CoreArray\Numeric.
 *
 * @package HylianShield
 * @subpackage Test
 * @copyright 2014 Noë Snaterse.
 */
namespace Tests\HylianShield\Validator\CoreArray;

/**
 * NumericTest.
 */
class NumericTest extends \Tests\HylianShield\Validator\TestBase
{
    /**
     * The name of our class to test.
     *
     * @var string $validatorClass
     */
    protected $validatorClass = '\HylianShield\Validator\CoreArray\Numeric';

    /**
     * A set of validations to pass.
     *
     * @var array $validations
     */
    protected $validations = array(
        array('Aap Noot Mies', false),
        array('0123456789', false),
        array('', false),
        array('€αβγδε', false),
        array(0123456789, false),
        array(0.123456789, false),
        array(null, false),
        array(0, false),
        array(.1, false),
        array(array(), true),
        array(array(12), true),
        array(array(1, 2, 3, 4), true),
        array(array("aap", "noot", "mies"), true),
        array(array(4 => "aap", 2 => "noot"), false),
        array(array("foo" => "aap", "bar" => "noot"), false)
    );

    /**
     * Set up a common validator.
     */
    protected function setUp()
    {
        // The new keyword is illegal in a class declaration.
        // However, it is interesting to know if CoreArray actually
        // invalidates an ArrayObject.
        $this->validations[] = array(new \ArrayObject, false);
        parent::setUp();
    }
}
