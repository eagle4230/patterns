<?php

abstract class Alarm
{
    abstract public function sendAlarm(): string;
}
class noAlarm extends Alarm
{
    public function sendAlarm(): string
    {
        return 'Без оповещения';
    }
}
abstract class AlarmDecorator extends Alarm
{
    protected Alarm $message;
    public function __construct(Alarm $message)
    {
        $this->message = $message;
    }
}
class smsDecorator extends AlarmDecorator
{
    public function sendAlarm(): string
    {
        return $this->message->sendAlarm() . " + SMS";
    }
}
class emailDecorator extends AlarmDecorator
{
    public function sendAlarm(): string
    {
        return $this->message->sendAlarm() . " + E-Mail";
    }
}

class cnDecorator extends AlarmDecorator
{
    public function sendAlarm(): string
    {
        return $this->message->sendAlarm() . " + CN";
    }
}

//$message = new noAlarm();
//$message = new smsDecorator(new noAlarm());
//$message = new emailDecorator(new smsDecorator(new noAlarm()));
//$message = new cnDecorator(new emailDecorator(new smsDecorator(new noAlarm())));
//print $message->sendAlarm() . PHP_EOL;