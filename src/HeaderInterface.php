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
}
