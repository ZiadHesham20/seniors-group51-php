<?php

require_once "EmpInterface.php";

class Employee implements EmployeeInterface
{
    public $name;

    private $salary = 10;

    protected $code = 101 ;

    public function login()
    {
        return "my name is : $this->name login";
    }

    public function logout()
    {
        return "logout and my salary is $this->code ";

    }
    public function salary($a, $b)
    {
        return 1000 * $a + $b;
    }
}
