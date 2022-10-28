<?php

namespace Last1971\SmartCommand;

use Last1971\SmartCommand\Interfaces\ICommand;

class MacroCommand implements Interfaces\ICommand
{

    /**
     * @var ICommand[]
     */
    private array $commands;

    /**
     * @param ICommand[] $commands
     */
    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}