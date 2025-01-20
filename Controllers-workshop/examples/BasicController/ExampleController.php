<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function showWelcome()
    {
        return ['message' => 'Welcome to the Laravel Controllers workshop!'];
    }

    public function showUser($id)
    {
        return ['id' => $id, 'name' => "User $id"];
    }
}
