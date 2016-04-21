<?php

abstract class Logger {
    private $next = null;

    public function setNext(Logger $logger) {
        $this->next = $logger;
        return $this->next;
    }

    final public function log($message) {
        $this->writeLog($message);

        if ($this->next !== null) {
            $this->next->log($message);
        }
    }

    abstract protected function writeLog($message);
}

class EmailLogger extends Logger {
    public function writeLog($message) {
        echo 'Logging to email: ' . $message;
    }
}

class ErrorLogger extends Logger {
    protected function writeLog($message) {
        echo 'Logging to stderr: ' . $message;
    }
}

class StdoutLogger extends Logger {
    protected function writeLog($message) {
        echo 'Logging to stdout: ' . $message;
    }
}

// Client
$logger = new StdoutLogger();

$logger->setNext(new ErrorLogger())
    ->setNext(new EmailLogger());

$logger->log('Log triggered!');
