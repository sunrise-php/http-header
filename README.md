## HTTP Header interface for PHP 7.2+ based on PSR-7

[![Build Status](https://api.travis-ci.com/sunrise-php/http-header.svg?branch=master)](https://travis-ci.com/sunrise-php/http-header)
[![CodeFactor](https://www.codefactor.io/repository/github/sunrise-php/http-header/badge)](https://www.codefactor.io/repository/github/sunrise-php/http-header)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/sunrise-php/http-header/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Latest Stable Version](https://poser.pugx.org/sunrise/http-header/v/stable)](https://packagist.org/packages/sunrise/http-header)
[![Total Downloads](https://poser.pugx.org/sunrise/http-header/downloads)](https://packagist.org/packages/sunrise/http-header)
[![License](https://poser.pugx.org/sunrise/http-header/license)](https://packagist.org/packages/sunrise/http-header)

## Installation

```
composer require sunrise/http-header
```

## How to use?

```php
use Psr\Http\Message\MessageInterface;
use Sunrise\Http\Header\HeaderInterface;

class AccessControlAllowCredentials implements HeaderInterface
{
	public function getFieldName() : string
	{
		return 'Access-Control-Allow-Credentials';
	}

	public function getFieldValue() : string
	{
		return 'true';
	}

	public function setToMessage(MessageInterface $message) : MessageInterface
	{
		return $message->withHeader($this->getFieldName(), $this->getFieldValue());
	}

	public function addToMessage(MessageInterface $message) : MessageInterface
	{
		return $message->withAddedHeader($this->getFieldName(), $this->getFieldValue());
	}
}
```

## Test run

```bash
php vendor/bin/phpunit
```

## Api documentation

https://phpdoc.fenric.ru/

## Useful links

https://www.php-fig.org/psr/psr-7/
