<?php

namespace App\Services;

class UserService
{
    public function getUserList()
    {
        return [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe'],
        ];
    }
}
