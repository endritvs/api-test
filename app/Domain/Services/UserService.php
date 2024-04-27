<?php

namespace App\Domain\Services;

use App\Domain\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->userRepository->save($data);
        });
    }

    public function updateUser($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $user = $this->userRepository->findById($id);
            return $this->userRepository->update($user, $data);
        });
    }

    public function listUsers()
    {
        return $this->userRepository->findAll();
    }

    public function deleteUserById($id)
    {
        return DB::transaction(function () use ($id) {
            $this->userRepository->delete($id);
        });
    }
}
