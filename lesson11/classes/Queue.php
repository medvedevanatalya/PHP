<?php


class Queue implements Iterator
{
    protected $queue = [];


    public function __construct()
    {
        $this->clear();
    }

    function clear()
    {
        $this->queue = [];
        return $this;
    }

    function add($item)
    {
        $this->queue[] = $item;
        return $this;
    }

    function pop()
    {
        return array_shift($this->queue);
    }

    function toArray(): array
    {
        return $this->queue;
    }

    public function current()
    {
        return $this->pop();
    }

    public function count()
    {
        return count($this->queue);
    }

    public function next()
    {
    }

    public function key()
    {
        return 0;
    }

    public function valid()
    {
        return isset($this->queue[0]);
    }

    public function rewind()
    {

    }
}