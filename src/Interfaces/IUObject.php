<?php

namespace Last1971\SmartCommand\Interfaces;

/** @template T */
interface IUObject extends IHashable
{
    /**
     * @param string $key
     * @return T
     */
    public function get(string $key): mixed;

    /**
     * @param string $key
     * @param T $value
     * @return void
     */
    public function set(string $key, mixed $value): void;
}