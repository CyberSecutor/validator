<?php
/**
 * Test for \HylianShield\Validator\String\Utf8.
 *
 * @package HylianShield
 * @subpackage Test
 */

namespace HylianShield\Tests\Validator\String;

use \HylianShield\Validator\String\Utf8;

/**
 * Utf8 string test.
 */
class Utf8Test extends \HylianShield\Tests\Validator\TestBase
{
    /**
     * The name of our class to test.
     *
     * @var string $validatorClass
     */
    protected $validatorClass = '\HylianShield\Validator\String\Utf8';

    /**
     * A set of validations to pass.
     *
     * @var array $validations
     */
    protected $validations;

    /**
     * Set up a common validator.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->validations = array(
            array('Aap Noot Mies', true),
            array('0123456789', true),
            array('', true),
            // Euro sign.
            array('€αβγδε', true),
            // Latin is a valid subset of utf-8.
            array(mb_convert_encoding('€αβγδε', 'Latin1'), true),
            array(mb_convert_encoding('€αβγδε', 'UTF-16', 'UTF-8'), false),
            array(mb_convert_encoding('€αβγδε', 'UTF-32', 'UTF-8'), false),
            array(null, false),
            array(0, false)
        );
    }
}
