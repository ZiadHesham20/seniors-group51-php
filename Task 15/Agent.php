<?php

require_once "Emp.php";


class Agent extends Employee
{
    public function hire()
    {
        return "aaaa $this->salary";
    }

}
