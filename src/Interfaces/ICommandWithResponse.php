<?php

namespace Last1971\SmartCommand\Interfaces;

interface ICommandWithResponse extends ICommand
{
    /**
     * @return mixed
     */
    public function response(): mixed;
}