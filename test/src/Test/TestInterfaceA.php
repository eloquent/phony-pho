<?php

namespace Eloquent\Phony\Pho\Test;

interface TestInterfaceA
{
    public static function testClassAStaticMethodA();

    public static function testClassAStaticMethodB($first, $second);

    public function testClassAMethodA();

    public function testClassAMethodB($first, $second);
}
