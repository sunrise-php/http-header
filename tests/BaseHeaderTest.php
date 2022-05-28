<?php

declare(strict_types=1);

namespace Sunrise\Http\Header\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sunrise\Http\Header\BaseHeader;
use Sunrise\Http\Header\HeaderInterface;

class BaseHeaderTest extends TestCase
{
    public function testContracts() : void
    {
        $header = $this->createMock(BaseHeader::class);

        $this->assertInstanceOf(HeaderInterface::class, $header);
    }

    public function testValidateNonStringFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name must be a string');

        BaseHeader::validateFieldName(null);
    }

    public function testValidateEmptyFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name is invalid');

        BaseHeader::validateFieldName('');
    }

    public function testValidateInvalidFieldName() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-name is invalid');

        BaseHeader::validateFieldName("\0");
    }

    public function testValidateNonStringFieldValue() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-value must be a string');

        BaseHeader::validateFieldValue(null);
    }

    public function testValidateInvalidFieldValue() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header field-value is invalid');

        BaseHeader::validateFieldValue("\0");
    }

    public function testStringify() : void
    {
        $header = $this->createMock(BaseHeader::class);

        $header->method('getFieldName')->willReturn('x-foo');
        $header->method('getFieldValue')->willReturn('bar');

        $this->assertSame('x-foo: bar', $header->__toString());
    }

    public function testUnpacking() : void
    {
        $header = $this->createMock(BaseHeader::class);

        $header->method('getFieldName')->willReturn('x-foo');
        $header->method('getFieldValue')->willReturn('bar');

        $this->assertSame(['x-foo', 'bar'], $header->getIterator()->getArrayCopy());
    }
}
