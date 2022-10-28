<?php

namespace Tests;

use Last1971\SmartCommand\Traits\CreateCommandTrait;

class TestCommand implements \Last1971\SmartCommand\Interfaces\ICommand
{
    use CreateCommandTrait;

    /**
     * @param TestInterface $test
     */
    public function __construct(private TestInterface $test)
    {
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->test->setSomeValue($this->test->getSomeValue() / 2);
    }
}