<?php

require_once "Emp.php";


class TeamLeader extends Employee
{
    public function makTask()
    {
        return "new task";
    }
    public function salary($a, $b)
    {
        return 1500 * $a + $b ;
    }
}
