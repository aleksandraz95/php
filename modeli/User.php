<?php

class User
{
    public $userId;
    public $name;

    public function __construct($userId = null, $name = null)
    {
        $this->userId = $userId;
        $this->name = $name;
    }

    public static function getAll(Mysqli $mysqli)
    {
        $query = "SELECT * FROM user";
        $rs =  $mysqli->query($query);

        $niz = [];

        while ($red = $rs->fetch_object()){
            $niz[] = new User($red->userId,$red->name);
        }

        return $niz;

    }

}