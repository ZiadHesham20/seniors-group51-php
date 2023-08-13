<?php
class Player{
    private string $name;
    public $position;
    public $speed;
    public $club;

    public function setName($nm){
        $this->name = $nm;
    }
    public function getName(){
        return $this->name;
    }

}