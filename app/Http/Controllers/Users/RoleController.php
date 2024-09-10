<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $data = [
            "roles" => []
        ];
        return view('pages/users/role',$data);
    }
}
