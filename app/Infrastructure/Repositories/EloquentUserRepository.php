<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UserRepository;
use App\Models\User;
use App\Domain\Entities\User as UserEntity;

class EloquentUserRepository implements UserRepository
{
    public function save($user)
    {
        $userModel = User::create($user);

        if ($user['address']) {
            $userModel->userDetails()->create([
                'address' => $user['address']
            ]);
        }

        return new UserEntity(
            $userModel->id,
            $userModel->name,
            $userModel->email,
            $userModel->password,
            $userModel->userDetails->address ?? null,
        );
    }

    public function update($user, array $attributes)
    {
        $userModel = User::with('userDetails')->findOrFail($user->id);
        $userModel->update($attributes);
        $userModel->userDetails()->updateOrCreate([], ['address' => $attributes['address'] ?? NULL]);

        return new UserEntity(
            $userModel->id,
            $userModel->name,
            $userModel->email,
            $userModel->password,
            $attributes['address'] ?? NULL,
        );
    }

    public function delete($id)
    {
        $userModel = User::with('userDetails')->findOrFail($id);
        $userModel->delete();
    }

    public function findById($id)
    {
        $userModel = User::with('userDetails')->findOrFail($id);
        return $userModel;
    }

    public function findAll()
    {
        $users = User::with('userDetails')->get();
        return $users->map(function ($userModel) {
            return new UserEntity(
                $userModel->id,
                $userModel->name,
                $userModel->email,
                $userModel->password,
                $userModel->userDetails->address ?? null,
            );
        });
    }
}
