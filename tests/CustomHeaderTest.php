<?php

declare(strict_types=1);

namespace Sunrise\Http\Header\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sunrise\Http\Header\CustomHeader;
use Sunrise\Http\Header\HeaderInterface;

class CustomHeaderTest extends TestCase
{
    public function testContracts() : void
    {
        $header = new CustomHeader('x-foo', 'bar');

        $this->assertInstanceOf(HeaderInterface::class, $header);
    }

    public function testConstructor() : void
    {
        $header = new CustomHeader('x-foo', 'bar');

        $this->assertSame('x-foo', $header->getFieldName());
        $this->assertSame('bar', $header->getFieldValue());
    }

    public function testConstructorWithNonStringFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name must be a string');

        new CustomHeader(null, '');
    }

    public function testConstructorWithEmptyFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name is invalid');

        new CustomHeader('', '');
    }

    public function testConstructorWithInvalidFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name is invalid');

        new CustomHeader("\0", '');
    }

    public function testConstructorWithNonStringFieldValue() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-value must be a string');

        new CustomHeader('x-foo', null);
    }

    public function testConstructorWithInvalidFieldValue() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-value is invalid');

        new CustomHeader('x-foo', "\0");
    }

    public function testStringify() : void
    {
        $header = new CustomHeader('x-foo', 'bar');

        $this->assertSame('x-foo: bar', $header->__toString());
    }

    public function testUnpacking() : void
    {
        $header = new CustomHeader('x-foo', 'bar');

        $this->assertSame(['x-foo', 'bar'], $header->getIterator()->getArrayCopy());
    }
}
