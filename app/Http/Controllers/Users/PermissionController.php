<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\PermissionRequest;
use App\Services\Users\PermissionService;
use DB;

class PermissionController extends Controller
{

    public function __construct(PermissionService $permissionService) {
        $this->permissionService  = $permissionService;
    }

    public function index() {
        $data = [
            "permissions" => $this->permissionService->paginate(10)
        ];
        return view('pages/users/permission',$data);
    }

    public function show($id) {
        try{
            $result = $this->permissionService->fetchById($id);
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

    public function store(PermissionRequest $request) {
        try{
            $result = $this->permissionService->create(
                            $request->name
                        );
    
            return redirect()->route('permissions.index')->with('success','Permission #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('permissions.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(PermissionRequest $request, $id) {
        try{
            $result = $this->permissionService->update(
                            $id,
                            $request->name
                        );
    
            return redirect()->route('permissions.index')->with('success','Permission #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('permissions.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->permissionService->delete(
                            $id
                        );
    
            return redirect()->route('permissions.index')->with('success','Permission deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('permissions.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
