<?php

namespace TheChoice\Tests\Integration\Contexts;

use \TheChoice\Contract\ContextInterface;

class InGroup implements ContextInterface
{
    public function getValue()
    {
        return 'testgroup';
    }
}