<?php

namespace TheChoice\Tests\Integration\Contexts;

use \TheChoice\Contract\ContextInterface;

class UtmSource implements ContextInterface
{
    public function getValue()
    {
        return 'abcd';
    }
}