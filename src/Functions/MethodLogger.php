<?php

class MethodLogger 
{
    private $log = [];

    public function __call($name, $arguments) {
        // Log the method name and arguments
        $this->log[] = ['method' => $name, 'arguments' => $arguments];

        // Optionally handle the method call
        // ...

        return null; // or some meaningful response
    }

    public function getLog() {
        return $this->log;
    }

    public function methodsLogged()
    {
        return array_column($this->log, "method");
    }
}
