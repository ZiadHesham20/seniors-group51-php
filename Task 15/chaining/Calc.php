<?php


class Calc
{
    public $x;
    public $y;
    public $result;

    public function __construct($num1, $num2)
    {
        $this->x = $num1;
        $this->y = $num2;
    }

    public function add()
    {
        $this->result = $this->x+$this->y;

        return $this;

    }
    public function minus()
    {
        $this->result = $this->x-$this->y;
        return $this;

    }
    public function multi()
    {
        $this->result = $this->x*$this->y;

    }
    public function div()
    {
        $this->result = $this->x/$this->y;
    }

    public function result()
    {
        echo $this->result;
        return $this ;
    }
}
