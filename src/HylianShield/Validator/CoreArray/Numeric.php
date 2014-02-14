<?php
/**
 * Validate array types.
 *
 * @package HylianShield
 * @subpackage Validator
 * @copyright 2014 Noë Snaterse.
 */

namespace HylianShield\Validator\CoreArray;

/**
 * Validates numeric arrays.
 */
class Numeric extends \HylianShield\Validator\CoreArray
{
    /**
     * The type.
     *
     * @var string $type
     */
    protected $type = 'array_numeric';

    /**
     * Creates a numeric array validator.
     */
    final protected function createValidator()
    {
        return function ($array) {
            // First check if $array is an actual array.
            if (!is_array($array)) {
                return false;
            }

            // Then get all the keys
            $keys = array_keys($array);

            // And check if they all are numeric.
            $arrayLength = count($keys);
            for ($i = 0; $i < $arrayLength; $i++) {
                if ($i !== $keys[$i]) {
                    return false;
                }
            }

            return true;
        };
    }
}
