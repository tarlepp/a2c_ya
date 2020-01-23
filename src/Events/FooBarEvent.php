<?php

namespace App\Events;

use App\DTO\FooBarDto;
use Symfony\Contracts\EventDispatcher\Event;

class FooBarEvent extends Event
{
    public const NAME = 'foobar.event';

    private $fooBarDto;

    public function __construct(FooBarDto $fooBarDto)
    {
        $this->fooBarDto = $fooBarDto;
    }

    public function getFooBarDto(): FooBarDto
    {
        return $this->fooBarDto;
    }
}
