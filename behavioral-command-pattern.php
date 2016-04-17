<?php

interface LightBulbCommand
{
    public function execute();
}

class LightBulbControl
{
    public function turnOn()
    {
        echo 'LightBulb turnOn';
    }

    public function turnOff()
    {
        echo 'LightBulb turnOff';
    }
}

class TurnOnLightBulb implements LightBulbCommand
{
    private $radioControl;

    public function __construct(LightBulbControl $radioControl)
    {
        $this->radioControl = $radioControl;
    }

    public function execute()
    {
        $this->radioControl->turnOn();
    }
}

class TurnOffLightBulb implements LightBulbCommand
{
    private $radioControl;

    public function __construct(LightBulbControl $radioControl)
    {
        $this->radioControl = $radioControl;
    }

    public function execute()
    {
        $this->radioControl->turnOff();
    }
}

// Client
$command = new TurnOffLightBulb(new LightBulbControl());
$command->execute();
