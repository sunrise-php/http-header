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
use Psr\Http\Message\MessageInterface;

/**
 * HeaderInterface
 */
interface HeaderInterface
{

	/**
	 * Regular Expression for a token validation
	 *
	 * @link https://tools.ietf.org/html/rfc7230#section-3.2
	 */
	public const RFC7230_TOKEN = '/^[\x21\x23-\x27\x2A\x2B\x2D\x2E\x30-\x39\x41-\x5A\x5E-\x7A\x7C\x7E]+$/';

	/**
	 * Regular Expression for a field-value validation
	 *
	 * @link https://tools.ietf.org/html/rfc7230#section-3.2
	 */
	public const RFC7230_FIELD_VALUE = '/^[\x09\x20-\x7E\x80-\xFF]*$/';

	/**
	 * Regular Expression for a quoted-string validation
	 *
	 * @link https://tools.ietf.org/html/rfc7230#section-3.2
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
	 * Sets the header to the given message
	 *
	 * @param MessageInterface $message
	 *
	 * @return MessageInterface
	 *
	 * @link https://www.php-fig.org/psr/psr-7/
	 */
	public function setToMessage(MessageInterface $message) : MessageInterface;

	/**
	 * Adds the header to the given message
	 *
	 * @param MessageInterface $message
	 *
	 * @return MessageInterface
	 *
	 * @link https://www.php-fig.org/psr/psr-7/
	 */
	public function addToMessage(MessageInterface $message) : MessageInterface;

	/**
	 * Converts the header to string
	 *
	 * @return string
	 *
	 * @link http://php.net/manual/en/language.oop5.magic.php#object.tostring
	 */
	public function __toString();
}
