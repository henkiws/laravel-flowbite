<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\TemplateRequest;
use App\Services\Master\TemplateService;
use DB;

class TemplateController extends Controller
{
    public function __construct(TemplateService $templateService) {
        $this->templateService  = $templateService;
    }

    public function index() {
        $data = [
            "templates" => $this->templateService->paginate(10)
        ];
        return view('pages/master/template',$data);
    }

    public function show($id) {
        try{
            $result = $this->templateService->fetchById($id);
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

    public function store(TemplateRequest $request) {
        try{
            $result = $this->templateService->create(
                            $request->name,
                            $request->description,
                            $request->image,
                            $request->active
                        );
    
            return redirect()->route('templates.index')->with('success','Template #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('templates.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(TemplateRequest $request, $id) {
        try{
            $result = $this->templateService->update(
                            $id,
                            $request->name,
                            $request->description,
                            $request->image,
                            $request->active
                        );
    
            return redirect()->route('templates.index')->with('success','Template #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('templates.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->templateService->delete(
                            $id
                        );
    
            return redirect()->route('templates.index')->with('success','Template deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('templates.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
