<?php

namespace Tests;

interface TestInterface
{
    public function getSomeValue(): float;

    public function setSomeValue(float $someValue);
}