<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\MusicRequest;
use App\Services\Master\MusicService;
use DB;

class MusicController extends Controller
{
    public function __construct(MusicService $musicService) {
        $this->musicService  = $musicService;
    }

    public function index() {
        $data = [
            "musics" => $this->musicService->paginate(10)
        ];
        return view('pages/master/music',$data);
    }

    public function show($id) {
        try{
            $result = $this->musicService->fetchById($id);
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

    public function store(MusicRequest $request) {
        try{
            $result = $this->musicService->create(
                            $request->name,
                            $request->description,
                            $request->file('path'),
                            $request->active
                        );
    
            return redirect()->route('musics.index')->with('success','Music #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('musics.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(MusicRequest $request, $id) {
        try{
            $result = $this->musicService->update(
                            $id,
                            $request->name,
                            $request->description,
                            $request->file('path'),
                            $request->active
                        );
    
            return redirect()->route('musics.index')->with('success','Music #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('musics.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->musicService->delete(
                            $id
                        );
    
            return redirect()->route('musics.index')->with('success','Music deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('musics.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
