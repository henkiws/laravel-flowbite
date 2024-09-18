<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Events\EventRequest;
use App\Services\Events\EventService;
use DB;

class EventController extends Controller
{
    public function __construct(EventService $eventService) {
        $this->eventService  = $eventService;
    }

    public function index() {
        $data = [
            "events" => $this->eventService->paginate(10)
        ];
        return view('pages/events/index',$data);
    }

    public function create() {
        $data = [];
        return view('pages/events/form',$data);
    }

    public function show($id) {
        try{
            $result = $this->eventService->fetchById($id);
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

    public function store(EventRequest $request) {
        try{
            $result = $this->eventService->create(
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('events.index')->with('success','Event #' . $result->name . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('events.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(EventRequest $request, $id) {
        try{
            $result = $this->eventService->update(
                            $id,
                            $request->name,
                            $request->description,
                            $request->file('image'),
                            $request->active
                        );
    
            return redirect()->route('events.index')->with('success','Event #' . $result->name . ' updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('events.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try{
            $result = $this->eventService->delete(
                            $id
                        );
    
            return redirect()->route('events.index')->with('success','Event deleted successfully');
        }catch( \Exception $e) {
            return redirect()->route('events.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
