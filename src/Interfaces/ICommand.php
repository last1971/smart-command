<?php

namespace Last1971\SmartCommand\Interfaces;

interface ICommand
{
    /**
     * @return void
     */
    public function execute(): void;
}