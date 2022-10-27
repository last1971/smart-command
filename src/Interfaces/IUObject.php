<?php

namespace Last1971\SmartCommand\Interfaces;

interface IUObject extends IHashable
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, mixed $value): void;
}