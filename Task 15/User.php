<?php



class User
{
    public Database $userDatabase;


    public function __construct(Database $dbDatabase)
    {
        $this->userDatabase = $dbDatabase;
    }
}
