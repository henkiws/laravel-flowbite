<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\TypeRequest;
use App\Services\Master\TypeService;
use DB;

class TypeController extends Controller
{
    public function __construct(TypeService $typeService) {
        $this->typeService  = $typeService;
    }

    public function index() {
        $data = [
            "types" => $this->typeService->paginate(10)
        ];
        return view('pages/master/type',$data);
    }

    public function show($id) {
        try{
            $result = $this->typeService->fetchById($id);
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

    public function store(TypeRequest $request) {
        try{
            $result = $this->typeService->create(
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('types.index')->with('success','Type #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('types.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(TypeRequest $request, $id) {
        try{
            $result = $this->typeService->update(
                            $id,
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('types.index')->with('success','Type #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('types.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->typeService->delete(
                            $id
                        );
    
            return redirect()->route('types.index')->with('success','Type deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('types.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
