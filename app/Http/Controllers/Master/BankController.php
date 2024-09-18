<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\BankRequest;
use App\Services\Master\BankService;
use DB;

class BankController extends Controller
{
    public function __construct(BankService $bankService) {
        $this->bankService  = $bankService;
    }

    public function index() {
        $data = [
            "banks" => $this->bankService->paginate(10)
        ];
        return view('pages/master/bank',$data);
    }

    public function show($id) {
        try{
            $result = $this->bankService->fetchById($id);
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

    public function store(BankRequest $request) {
        try{
            $result = $this->bankService->create(
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('banks.index')->with('success','Bank #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('banks.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(BankRequest $request, $id) {
        try{
            $result = $this->bankService->update(
                            $id,
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('banks.index')->with('success','Bank #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('banks.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->bankService->delete(
                            $id
                        );
    
            return redirect()->route('banks.index')->with('success','Bank deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('banks.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
