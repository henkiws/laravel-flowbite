<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Events\GalleryRequest;
use App\Services\Events\EventService;
use App\Services\Events\EventGalleryService;
use App\Services\Master\TypeService;
use App\Services\Master\MusicService;
use App\Services\Master\TemplateService;
use Illuminate\Support\Str;

class EventGalleryController extends Controller
{
    public function __construct(EventService $eventService,
                                TypeService $typeService,
                                EventGalleryService $eventGalleryService,
                                MusicService $musicService,
                                TemplateService $templateService) {
        $this->eventService  = $eventService;
        $this->eventGalleryService  = $eventGalleryService;
        $this->typeService  = $typeService;
        $this->musicService  = $musicService;
        $this->templateService  = $templateService;
    }

    public function edit($id) {
        $data = [
            "event" => $this->eventService->fetchById($id),
            "form_event_type" => $this->typeService->formList('fk_event_group',1),
            "form_event_template" => $this->templateService->formList('fk_template',1),
            "form_event_music" => $this->musicService->formList('fk_music'),
            "event_cover" => $this->eventGalleryService->fetchByEvent($id),
            "tab_active" => ['general_info','cover_image'],
            "content_active" => 'cover_image'
        ];
        return view('pages/events/form',$data);
    }

    public function update(Request $request, $id) {
        try{
            $result = $this->eventGalleryService->create(
                            $id,
                            2, // header
                            Str::random(30),
                            $request->file('cover_image_file')                     
                        );
    
            return redirect()->route('gallery.edit',[$id])->with('success','Event updated successfully');
        }catch( \Exception $e) {
            return redirect()->route('gallery.edit',[$id])->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
