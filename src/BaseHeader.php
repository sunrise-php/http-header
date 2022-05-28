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
use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

/**
 * Import functions
 */
use function is_string;
use function preg_match;
use function sprintf;

/**
 * @template-implements IteratorAggregate<int, string>
 */
abstract class BaseHeader implements HeaderInterface, IteratorAggregate
{

    /**
     * Validates the given header field-name
     *
     * @param mixed $fieldName
     *
     * @return void
     *
     * @throws InvalidArgumentException
     *         If the header field-name isn't valid.
     */
    final public static function validateFieldName($fieldName) : void
    {
        if (!is_string($fieldName)) {
            throw new InvalidArgumentException('Header field-name must be a string');
        }

        if (!preg_match(HeaderInterface::RFC7230_TOKEN, $fieldName)) {
            throw new InvalidArgumentException('Header field-name is invalid');
        }
    }

    /**
     * Validates the given header field-value
     *
     * @param mixed $fieldValue
     *
     * @return void
     *
     * @throws InvalidArgumentException
     *         If the header field-value isn't valid.
     */
    final public static function validateFieldValue($fieldValue) : void
    {
        if (!is_string($fieldValue)) {
            throw new InvalidArgumentException('Header field-value must be a string');
        }

        if (!preg_match(HeaderInterface::RFC7230_FIELD_VALUE, $fieldValue)) {
            throw new InvalidArgumentException('Header field-value is invalid');
        }
    }

    /**
     * {@inheritdoc}
     */
    final public function __toString() : string
    {
        return sprintf('%s: %s', $this->getFieldName(), $this->getFieldValue());
    }

    /**
     * {@inheritdoc}
     */
    final public function getIterator() : Traversable
    {
        return new ArrayIterator([$this->getFieldName(), $this->getFieldValue()]);
    }
}
