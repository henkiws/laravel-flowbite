<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UserRequest;
use App\Services\Users\UserService;
use App\Services\Users\RoleService;
use DB;

class UserController extends Controller
{
    public function __construct(UserService $userService,
                                RoleService $roleService) {
        $this->userService  = $userService;
        $this->roleService  = $roleService;
    }

    public function index() {
        $data = [
            "users" => $this->userService->paginate(10),
            "form_role" => $this->roleService->formList('role')
        ];
        return view('pages/users/user',$data);
    }

    public function show($id) {
        try{
            $result = $this->userService->fetchById($id);
            return response()->json([
                "data"  => $result,
                "msg"   => "Fetch data successfully"
            ],200);
        }catch( \Exception $e) {
            return response()->json([
                "data"  => [],
                "msg"   => $e->getMessage()
            ],400);
        }
    }

    public function store(UserRequest $request) {
        try{
            $result = $this->userService->create(
                            $request->name,
                            $request->email,
                            $request->password,
                            $request->role,
                        );
    
            return redirect()->route('users.index')->with('success','User #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('users.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(UserRequest $request, $id) {
        try{
            $result = $this->userService->update(
                            $id,
                            $request->email,
                            $request->password,
                            $request->role,
                        );
    
            return redirect()->route('users.index')->with('success','User #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('users.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->userService->delete(
                            $id
                        );
    
            return redirect()->route('users.index')->with('success','User deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('users.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
