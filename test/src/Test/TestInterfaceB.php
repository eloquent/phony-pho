<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho\Test;

interface TestInterfaceB extends TestInterfaceA
{
    public static function testClassBStaticMethodA();

    public function testClassBMethodA();

    public function testClassBMethodB(&$first, &$second);
}
