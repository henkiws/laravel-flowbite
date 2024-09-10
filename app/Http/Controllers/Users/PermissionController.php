<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        $data = [
            "permissions" => []
        ];
        return view('pages/users/permission',$data);
    }
}
