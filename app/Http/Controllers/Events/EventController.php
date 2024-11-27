<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Events\EventRequest;
use App\Services\Events\EventService;
use App\Services\Master\TypeService;
use App\Services\Master\MusicService;
use App\Services\Master\TemplateService;
use DB;

class EventController extends Controller
{
    public function __construct(EventService $eventService,
                                TypeService $typeService,
                                MusicService $musicService,
                                TemplateService $templateService) {
        $this->eventService  = $eventService;
        $this->typeService  = $typeService;
        $this->musicService  = $musicService;
        $this->templateService  = $templateService;
    }

    public function index() {
        $data = [
            "events" => $this->eventService->paginate(10)
        ];
        return view('pages/events/index',$data);
    }

    public function create() {
        $data = [
            "form_event_type" => $this->typeService->formList('fk_event_group'),
            "form_event_template" => $this->templateService->formList('fk_template'),
            "form_event_music" => $this->musicService->formList('fk_music'),
        ];
        return view('pages/events/form',$data);
    }

    public function edit($id) {
        $data = [
            "event" => $this->eventService->fetchById($id),
            "form_event_type" => $this->typeService->formList('fk_event_group',1),
            "form_event_template" => $this->templateService->formList('fk_template',1),
            "form_event_music" => $this->musicService->formList('fk_music'),
            "tab_active" => ['general_info'],
            "content_active" => 'general_info'
        ];
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
                            $request->title,
                            $request->name,
                            $request->initial_name,
                            $request->fk_event_group,
                            $request->fk_template,
                            $request->fk_music,
                            $request->quotes,
                            $request->event_date,
                            $request->show_prokes??0                        
                        );
            return redirect()->route('events.edit',[$result->id])->with('success','Event #' . $result->title . ' created successfully');
        }catch( \Exception $e) {
            return redirect()->route('events.index')->withErrors(['msg' => $e->getMessage()]);
        }
    }

    public function update(EventRequest $request, $id) {
        try{
            $result = $this->eventService->update(
                            $id,
                            $request->title,
                            $request->name,
                            $request->initial_name,
                            $request->fk_event_group,
                            $request->fk_template,
                            $request->fk_music,
                            $request->quotes,
                            $request->event_date,
                            $request->show_prokes??0                        
                        );
    
            return redirect()->route('gallery.edit',[$result->id])->with('success','Event #' . $result->title . ' updated successfully');
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
