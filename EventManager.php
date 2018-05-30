<?php

class EventManager
{
    protected $events = [];

    public function attach($eventName, $callback)
    {
        if (!isset($this->events[$eventName])) {
            $this->events[$eventName] = [];
        }
        $this->events[$eventName][] = $callback;
    }

    public function trigger($eventName, $data = null)
    {
        foreach ($this->events[$eventName] as $callback) {
            $callback($eventName, $data);
        }
    }
}