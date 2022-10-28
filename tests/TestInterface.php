<?php

namespace Tests;

interface TestInterface
{
    /**
     * @return float
     */
    public function getSomeValue(): float;

    /**
     * @param float $someValue
     * @return void
     */
    public function setSomeValue(float $someValue): void;
}