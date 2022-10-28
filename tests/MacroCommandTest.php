<?php

namespace Tests;

use Last1971\SmartCommand\Interfaces\ICommand;
use Last1971\SmartCommand\MacroCommand;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class MacroCommandTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function testExecute(): void
    {
        $command = $this->createMock(ICommand::class);
        $command->expects($this->exactly(3))->method('execute');
        $macroCommand = new MacroCommand([$command, $command, $command]);
        $macroCommand->execute();
    }
}