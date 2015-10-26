<?php
/**
 * Abstract layer to couple the internal filter_var logic with the HylianShield validator.
 *
 * @package HylianShield
 * @subpackage Validator
 */

namespace HylianShield\Validator;

use \LogicException;

/**
 * Filter abstraction.
 * Abstract layer to couple the internal filter_var logic with the HylianShield validator.
 * @see http://php.net/manual/en/function.filter-var.php
 */
abstract class Filter extends \HylianShield\Validator
{
    /**
     * The filter to apply to the filter_var function.
     *
     * @var integer $filter
     */
    protected $filter = 0;

    /**
     * A list of valid filters for Filter implementations.
     *
     * @var array $allowedFilters
     */
    private static $allowedFilters = array(
        FILTER_VALIDATE_BOOLEAN,
        FILTER_VALIDATE_EMAIL,
        FILTER_VALIDATE_FLOAT,
        FILTER_VALIDATE_INT,
        FILTER_VALIDATE_IP,
        FILTER_VALIDATE_REGEXP,
        FILTER_VALIDATE_URL
    );

    /**
     * Options for the filter, if it accepts any.
     *
     * @var array $options
     * @see http://php.net/manual/en/function.filter-var.php#refsect1-function.filter-var-parameters
     * @see http://php.net/manual/en/filter.filters.validate.php
     */
    protected static $options = array(
        'default' => false
    );

    /**
     * Flags for the filter, if it accepts any.
     *
     * @var integer $flags
     * @see http://php.net/manual/en/function.filter-var.php#refsect1-function.filter-var-parameters
     * @see http://php.net/manual/en/filter.filters.validate.php
     */
    protected static $flags = 0;

    /**
     * The constructor for Filter.
     *
     * @throws \LogicException when $this::FILTER is not an integer or no more than zero.
     */
    final public function __construct()
    {
        if (!in_array($this->filter, self::$allowedFilters, true)) {
            throw new LogicException('Invalid filter configured!');
        }

        $this->validator = array($this, 'filterVar');
    }

    /**
     * Filter the given var using the $this::FILTER constant.
     *
     * @param mixed $var
     * @return boolean
     */
    final protected function filterVar($var)
    {
        return filter_var(
            $var,
            $this->filter,
            array(
                'options' => $this::$options,
                'flags' => $this::$flags
            )
        );
    }
}
