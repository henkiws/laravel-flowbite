<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\RoleRequest;
use App\Services\Users\RoleService;
use DB;

class RoleController extends Controller
{
    public function __construct(RoleService $roleService) {
        $this->roleService  = $roleService;
    }

    public function index() {
        $data = [
            "roles" => $this->roleService->paginate(10)
        ];
        return view('pages/users/role',$data);
    }

    public function show($id) {
        try{
            $result = $this->roleService->fetchById($id);
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

    public function store(RoleRequest $request) {
        try{
            $result = $this->roleService->create(
                            $request->name
                        );
    
            return redirect()->route('roles.index')->with('success','Permission #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('roles.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(RoleRequest $request, $id) {
        try{
            $result = $this->roleService->update(
                            $id,
                            $request->name
                        );
    
            return redirect()->route('roles.index')->with('success','Permission #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('roles.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->roleService->delete(
                            $id
                        );
    
            return redirect()->route('roles.index')->with('success','Permission deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('roles.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
