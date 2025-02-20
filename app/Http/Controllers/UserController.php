<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser()
    {
        User::create([
            'name' => 'abdelouafi ',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('yourpassword'), 
        ]);
        
        return ' creted ';
    }
}
