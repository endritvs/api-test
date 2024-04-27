<?php

namespace App\Domain\Entities;

class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $address; // Optional

    public function __construct($id,$first_name, $last_name, $email, $password, $address = null)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new \Exception("Property {$property} does not exist on the User entity.");
    }
}
