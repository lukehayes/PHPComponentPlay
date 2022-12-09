<?php
namespace App\DB\Model;

/**
 * Class for use as a return type to Query::getUser.
 **/
class User
{
    public function getID() : int
    {
        return $this->id;
    }

    public function getUsername() : string
    {
        return $this->username;
    }
}
