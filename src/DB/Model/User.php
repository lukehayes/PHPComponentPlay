<?php
namespace App\DB\Model;

/**
 * Class for use as a return type to Query::getUser.
 **/
class User
{
    private $authenticated = false;

    public function getID() : int
    {
        return $this->id;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function authenticated() : bool
    {
        return $this->authenticated;
    }

    public function notAuthenticated() : bool
    {
        return !!$this->authenticated;
    }
}
