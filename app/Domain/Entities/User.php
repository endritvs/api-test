<?php

namespace App\Domain\Entities;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $address; // Optional

    public function __construct($id,$name, $email, $password, $address = null)
    {
        $this->id = $id;
        $this->name = $name;
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
