<?php

namespace Last1971\SmartCommand\Interfaces;

interface IHashable
{
    /**
     * @return string
     */
    public function hash(): string;
}