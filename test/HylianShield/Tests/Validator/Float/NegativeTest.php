<?php
/**
 * Test for \HylianShield\Validator\Float\Negative.
 *
 * @package HylianShield
 * @subpackage Test
 */

namespace HylianShield\Tests\Validator\Float;

use \HylianShield\Validator\Float\Negative;

/**
 * Negative test.
 */
class NegativeTest extends \HylianShield\Tests\Validator\TestBase
{
    /**
     * The name of our class to test.
     *
     * @var string $validatorClass
     */
    protected $validatorClass = '\HylianShield\Validator\Float\Negative';

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
        array(null, false),
        array(0, false),
        array(.1, false),
        array(-.1, true),
        array('.1', false),
        array(1, false),
        array(-1, false),
        array(\HylianShield\Validator\Float\Positive::BOUNDARY, false),
        array(\HylianShield\Validator\Integer\Positive::BOUNDARY, false),
        array(\HylianShield\Validator\Float\Negative::BOUNDARY, true),
        array(\HylianShield\Validator\Integer\Negative::BOUNDARY, false),
        array(array(), false),
        array(array(12), false),
        array('count', false),
        array('strtotime', false),
        array('MyNonExistentFunction', false)
    );
}
