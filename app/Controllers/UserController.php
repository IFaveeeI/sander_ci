<?php

namespace App\Controllers;

class USerController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function adduser(){
        return view('user/add');
    }
}