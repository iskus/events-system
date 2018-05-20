<?php

class Notify implements SplObserver
{
    protected $name;
    protected $priority = 0;

    public function __construct($name, $priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }

    public function update(SplSubject $event)
    {
        var_dump($event);
    }

    public function getPriority()
    {
        return $this->priority;
    }

}