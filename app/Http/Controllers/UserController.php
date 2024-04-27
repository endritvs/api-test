<?php

namespace App\Http\Controllers;

use App\Domain\Services\UserService;
use App\Http\Requests\{CreateUserRequest, UpdateUserRequest};
use App\Http\Responses\ResponseHandler;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(CreateUserRequest  $request)
    {
        try {
            $user = $this->userService->createUser($request->validated());
            return ResponseHandler::success($user, 201);
        } catch (\Exception $e) {
            return ResponseHandler::exception($e, 400);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $updatedUser = $this->userService->updateUser($id, $request->validated());
            return ResponseHandler::success($updatedUser);
        } catch (\Exception $e) {
            return ResponseHandler::exception($e, 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->deleteUserById($id);
            return ResponseHandler::success(['success' => true]);
        } catch (\Exception $e) {
            return ResponseHandler::exception($e, 404);
        }
    }

    public function index()
    {
        try {
            $users = $this->userService->listUsers();
            return ResponseHandler::success($users);
        } catch (\Exception $e) {
            return ResponseHandler::exception($e, 500);
        }
    }
}