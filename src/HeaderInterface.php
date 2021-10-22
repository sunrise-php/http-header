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
 * HeaderInterface
 */
interface HeaderInterface
{

    /**
     * Regular Expression for a token validation
     *
     * @link https://tools.ietf.org/html/rfc7230#section-3.2
     *
     * @var string
     */
    public const RFC7230_TOKEN = '/^[\x21\x23-\x27\x2A\x2B\x2D\x2E\x30-\x39\x41-\x5A\x5E-\x7A\x7C\x7E]+$/';

    /**
     * Regular Expression for a field-value validation
     *
     * @link https://tools.ietf.org/html/rfc7230#section-3.2
     *
     * @var string
     */
    public const RFC7230_FIELD_VALUE = '/^[\x09\x20-\x7E\x80-\xFF]*$/';

    /**
     * Regular Expression for a quoted-string validation
     *
     * @link https://tools.ietf.org/html/rfc7230#section-3.2
     *
     * @var string
     */
    public const RFC7230_QUOTED_STRING = '/^[\x09\x20\x21\x23-\x5B\x5D-\x7E\x80-\xFF]*$/';

    /**
     * Gets the header field-name
     *
     * @return string
     */
    public function getFieldName() : string;

    /**
     * Gets the header field-value
     *
     * @return string
     */
    public function getFieldValue() : string;

    /**
     * Converts the header to a string
     *
     * @link http://php.net/manual/en/language.oop5.magic.php#object.tostring
     *
     * @return string
     */
    public function __toString();
}
