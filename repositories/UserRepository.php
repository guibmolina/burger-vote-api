<?php

declare(strict_types= 1);

namespace Repositories;

use App\Models\User;

class UserRepository
{
    public function firstOrCreateUser(string $name, string $cpf): User
    {
        try {
            return User::firstOrCreate(["name"=> $name,"document"=> $cpf]);
        } catch (\Exception $e) {
            throw new \Exception("Failed to create User");
        }
    }
}