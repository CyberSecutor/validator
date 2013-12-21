<?php
/**
 * Validate strings.
 *
 * @package HylianShield
 * @subpackage Validator
 * @copyright 2013 Remko "CyberSecutor" Silvs
 */

namespace HylianShield\Validator\String;

/**
 * Utf8.
 */
class Utf8 extends \HylianShield\Validator\Range
{
    /**
     * The type.
     *
     * @var string $type
     */
    protected $type = 'string_utf8';

    /**
     * The validator.
     *
     * @var callable $validator
     */
    protected $validator;

    /**
     * The callable to return the length of the value.
     *
     * @var callable $lengthCheck
     */
    protected $lengthCheck = 'mb_strlen';

    /**
     * Initialize the validator.
     */
    function __construct() {
        $this->validator = function($string) {
            // mb_check_encoding will pass integers.
            return is_string($string) ? mb_check_encoding($string, 'UTF-8') : false;
        };
    }
}
