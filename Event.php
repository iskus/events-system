<?php

abstract class Event implements SplSubject
{
    protected $priorities = [];
    protected $notifiers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function attach(SplObserver $notify)
    {
        $notifyKey = spl_object_hash($notify);
        $this->notifiers[$notifyKey] = $notify;
        $this->priorities[$notifyKey] = $notify->getPriority();
        arsort($this->priorities);
    }

    public function detach(SplObserver $notify)
    {
        $notifyKey = spl_object_hash($notify);
        unset($this->notifiers[$notifyKey]);
        unset($this->priorities[$notifyKey]);
    }

    public function notify()
    {
        foreach ($this->priorities as $key => $value) {
            $this->notifiers[$key]->update($this);
        }
    }

}