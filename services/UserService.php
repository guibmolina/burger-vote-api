<?php

declare(strict_types=1);

namespace Services;

use App\Models\User;
use Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $repository)
    {}
    public function registerUser(string $name, string $document): string
    {
        $user = $this->repository->firstOrCreateUser($name, $document);

        return $this->authUser($user);
    }

    private function authUser(User $user): string
    {
        if ($user->tokens()->count() > 1) {
            $user->tokens()->delete();
        }

        return $user->createToken($user->name)->plainTextToken;
    }
}