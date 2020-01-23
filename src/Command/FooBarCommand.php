<?php

namespace App\Command;

use App\DTO\FooBarDto;
use App\Events\FooBarEvent;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class FooBarCommand extends Command
{
    protected static $defaultName = 'foo:bar';

    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct(self::$defaultName);

        $this->eventDispatcher = $eventDispatcher;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fooBarDto = new FooBarDto();
        $fooBarDto->bar = 'barbar';
        $fooBarDto->foo = 'foofoo';

        $this->eventDispatcher->dispatch(new FooBarEvent($fooBarDto));

        return 0;
    }
}
