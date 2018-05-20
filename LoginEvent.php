<?php

class LoginEvent extends Event
{
    public function warning()
    {
        $email = new Notify('UserEmailNotify');
        $this->attach($email);
    }
}