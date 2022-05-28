<?php declare(strict_types=1);

/**
 * It's free open-source software released under the MIT License.
 *
 * @author Anatoly Fenric <anatoly@fenric.ru>
 * @copyright Copyright (c) 2018, Anatoly Fenric
 * @license https://github.com/sunrise-php/http-header/blob/master/LICENSE
 * @link https://github.com/sunrise-php/http-header
 */

namespace Sunrise\Http\Header;

/**
 * Import classes
 */
use InvalidArgumentException;

/**
 * CustomHeader
 */
class CustomHeader extends BaseHeader
{

    /**
     * The header field-name
     *
     * @var string
     *
     * @readonly
     */
    private $fieldName;

    /**
     * The header field-value
     *
     * @var string
     *
     * @readonly
     */
    private $fieldValue;

    /**
     * Constructor of the class
     *
     * @param mixed $fieldName
     * @param mixed $fieldValue
     *
     * @throws InvalidArgumentException
     *         If the header field name of value isn't valid.
     */
    public function __construct($fieldName, $fieldValue)
    {
        self::validateFieldName($fieldName);
        self::validateFieldValue($fieldValue);

        /** @var string */
        $this->fieldName = $fieldName;
        /** @var string */
        $this->fieldValue = $fieldValue;
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldName() : string
    {
        return $this->fieldName;
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldValue() : string
    {
        return $this->fieldValue;
    }
}
