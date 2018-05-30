<?php

class TicketEvent extends Event
{
    public function created()
    {
        $userEmail = new Notify('UserEmailNotify', 3);
        $adminEmail = new Notify('AdminEmailNotify', 1);
        $this->attach($userEmail);
        $this->attach($adminEmail);
    }
}