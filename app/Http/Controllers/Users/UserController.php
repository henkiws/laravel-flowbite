<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = [
            "users" => []
        ];
        return view('pages/users/user', $data);
    }
}
