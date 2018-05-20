<?php

class BookEvent extends Event
{
    public function block()
    {
        $system = new Notify('UserSystemNotify');
        $this->attach($system);
    }
}