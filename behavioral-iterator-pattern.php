<?php

class ProductIterator implements \Iterator
{
    private $position = 0;
    private $productsCollection;

    public function __construct(ProductCollection $productsCollection)
    {
        $this->productsCollection = $productsCollection;
    }

    public function current()
    {
        return $this->productsCollection->getTitle($this->position);
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return !is_null($this->productsCollection->getTitle($this->position));
    }
}

class ProductCollection implements \IteratorAggregate
{
    private $titles = array();

    public function getIterator()
    {
        return new ProductIterator($this);
    }

    public function addTitle($string)
    {
        $this->titles[] = $string;
    }

    public function getTitle($key)
    {
        if (isset($this->titles[$key])) {
            return $this->titles[$key];
        }
        return null;
    }

    public function isEmpty()
    {
        return empty($titles);
    }
}

$productsCollection = new ProductCollection();
$productsCollection->addTitle('Design Patterns');
$productsCollection->addTitle('PHP7 is the best');
$productsCollection->addTitle('Laravel Rules');
$productsCollection->addTitle('DHH Rules');

foreach ($productsCollection as $product) {
    var_dump($product);
}
