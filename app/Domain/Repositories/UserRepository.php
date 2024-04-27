<?php

namespace App\Domain\Repositories;

interface UserRepository
{
    public function save($user);
    public function update($user, array $attributes);
    public function findById($id);
    public function delete($id);
    public function findAll();
}
