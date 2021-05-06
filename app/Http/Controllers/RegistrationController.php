<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration(){
        return view('registration');
    }
    public function login(){
        echo 'хуй';
        return view('login');
    }
}
