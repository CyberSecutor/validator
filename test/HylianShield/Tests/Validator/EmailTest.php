<?php
/**
 * Test for \HylianShield\Validator\Email.
 *
 * @package HylianShield
 * @subpackage Test
 */

namespace HylianShield\Tests\Validator;

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
        array(0123456789, false),
        array(null, false),
        array(0, false),
        array('git@github.com', true),
        array('navi@hylianshield.org', true),
        array('x+1234@mail.issuetracker.com', true)
    );
}
