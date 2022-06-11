<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Stores information of a user.
*************************************/

class User
{
    private $id;
    private $name;

    public function __construct()
    {
        $this->id = NULL;
        $this->name = NULL;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
