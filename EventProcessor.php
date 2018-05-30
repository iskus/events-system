<?php

class EventProcessor
{
    private static $data = [];
    private static $eventClassName = '';
    private static $action = '';
    private static $event;

    static public function init(string $subject, array $data)
    {
        $subject = explode('.', $subject);
        self::$eventClassName = ucfirst(strtolower($subject[0]));
        self::$action = strtolower($subject[1]);
        self::$data = $data;
        self::eventCreator();
        self::process();
    }

    private static function eventCreator()
    {
        $name = self::$eventClassName . 'Event';
        self::$event = new $name(self::$data);

        foreach (self::$data as $key => $val) {
            if (method_exists(self::$event, $method = 'set' . ucfirst($key))) {
                self::$event->$method($val);
            } else {
                self::$event->$key = $val;
            }
        }
    }

    private static function process()
    {
        self::$event->{self::$action}(self::$event);
        self::$event->notify();
    }
}

