<?php

namespace Sunrise\Http\Header\Tests;

use PHPUnit\Framework\TestCase;

class HeaderInterfaceTest extends TestCase
{
	public function testAutoload()
	{
		$dist = '\\Sunrise\\Http\\Header\\HeaderInterface';

		$this->assertTrue(\interface_exists($dist));
	}
}
