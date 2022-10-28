<?php

namespace Last1971\SmartCommand;

class UObject implements Interfaces\IUObject
{
    /**
     * @var mixed[]
     */
    private array $values;

    /**
     * @param mixed[] $values
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    /**
     * @return string
     */
    public function hash(): string
    {
        return md5(serialize($this->values));
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->values[$key] ?? null;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }
}