<?php

interface Button
{
    public function render();
}

// Abstract Factory [abstract class OR interface]
interface GUIFactory
{
    public function createButton();
}

// Concrete Product [class]
class SubmitButton implements Button
{

    public function render()
    {
        echo 'Render Submit Button';
    }
}

// Concrete Product [class]
class ResetButton implements Button
{

    public function render()
    {
        echo 'Render Reset Button';
    }
}

// Concrete Factory [class]
class SubmitFactory implements GUIFactory
{

    public function createButton()
    {
        return new SubmitButton();
    }
}

// Concrete Factory [class]
class ResetFactory implements GUIFactory
{

    public function createButton()
    {
        return new ResetButton();
    }
}

// Client
$submitFactory = new SubmitFactory();
$button = $submitFactory->createButton();
$button->render();

// Client
$resetFactory = new ResetFactory();
$button = $resetFactory->createButton();
$button->render();
