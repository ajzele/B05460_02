<?php

class Logger
{
    // Holds an instance of the class
    private static $instance;

    // Implements singleton, always returns same instance
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    // Imaginary instance method, logs notices
    public function logNotice($msg)
    {
        return 'logNotice' . $msg;
    }

    // Imaginary instance method, logs warnings
    public function logWarning($msg)
    {
        return 'logWarning' . $msg;
    }

    // Imaginary instance method, logs errors
    public function logError($msg)
    {
        return 'logError: ' . $msg;
    }
}

// Client
echo Logger::getInstance()->logNotice('Test1');
echo Logger::getInstance()->logWarning('Test1');
echo Logger::getInstance()->logError('Test1');
