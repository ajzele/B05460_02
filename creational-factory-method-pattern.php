<?php

interface CarFactory {
    public function makeCar();
}

interface Car {
    public function getType();
}

class ChevroletFactory implements CarFactory {
    public function makeCar() {
        return new Chevrolet();
    }
}

class Chevrolet implements Car {
    public function getType() {
        return 'Chevrolet';
    }
}

/* Client */
$factory = new ChevroletFactory();
$car = $factory->makeCar();
echo $car->getType();
