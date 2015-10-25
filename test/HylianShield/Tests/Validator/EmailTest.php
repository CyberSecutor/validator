<?php
/**
 * Test for \HylianShield\Validator\Email.
 *
 * @package HylianShield
 * @subpackage Test
 */

namespace HylianShield\Tests\Validator;

use \HylianShield\Validator\Email;

/**
 * EmailTest.
 */
class EmailTest extends \HylianShield\Tests\Validator\TestBase
{
    /**
     * The name of our class to test.
     *
     * @var Email $validatorClass
     */
    protected $validatorClass = '\HylianShield\Validator\Email';

    /**
     * A set of validations to pass.
     *
     * @var array $validations
     */
    protected $validations = array(
        array('Aap Noot Mies', false),
        array('0123456789', false),
        array('', false),
        array(null, false),
        array(0, false),
        array('git@github.com', true),
        array('navi@hylianshield.org', true),
        array('x+1234@mail.issuetracker.com', true),
        array('€αβγδε@woop.woop.woop', false)
    );

    /**
     * Test that the constructor throws when the filter is mis-configured.
     *
     * @return void
     * @expectedException \LogicException
     * @expectedExceptionMessage Invalid filter configured!
     * @requires PHP 5.4
     */
    public function testIllegalFilter()
    {
        $validator = clone $this->validator;
        $reflection = new \ReflectionObject($validator);

        $property = $reflection->getProperty('filter');
        $property->setAccessible(true);
        $property->setValue($validator, null);
        $property->setAccessible(false);

        $reflection
            ->getConstructor()
            ->invoke($validator);
    }
}
