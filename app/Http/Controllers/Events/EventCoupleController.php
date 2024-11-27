<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Events\EventRequest;
use App\Services\Events\EventService;
use App\Services\Events\EventCoupleService;
use App\Services\Master\TypeService;
use App\Services\Master\MusicService;
use App\Services\Master\TemplateService;

class EventCoupleController extends Controller
{
    public function __construct(EventService $eventService,
                                TypeService $typeService,
                                EventCoupleService $eventCoupleService,
                                MusicService $musicService,
                                TemplateService $templateService) {
        $this->eventService  = $eventService;
        $this->eventCoupleService  = $eventCoupleService;
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
            "groom" => $this->eventCoupleService->fetchByType('groom',$id),
            "bride" => $this->eventCoupleService->fetchByType('bride',$id),
            "tab_active" => ['general_info','cover_image','groom_bride'],
            "content_active" => 'groom_bride'
        ];
        return view('pages/events/form',$data);
    }

    public function update(Request $request, $fk_event) {
        try{

            $request->validate([
                'groom_fullname' => 'required|max:255',
                'groom_nickname' => 'required|max:255',
                'groom_photo' => 'required_without:groom_id|max:10000|mimes:png,jpg,jpeg,webp',
                'groom_address' => 'required',
                'groom_child' => 'required|max:255',
                'groom_father' => 'required|max:255',
                'groom_mother' => 'required|max:255',
                'bride_fullname' => 'required|max:255',
                'bride_nickname' => 'required|max:255',
                'bride_photo' => 'required_without:bride_id|max:10000|mimes:png,jpg,jpeg,webp',
                'bride_address' => 'required',
                'bride_child' => 'required|max:255',
                'bride_father' => 'required|max:255',
                'bride_mother' => 'required|max:255'
            ]);

            if( $request->groom_id > 0 && $request->bride_id > 0 ) {
                $groom = $this->eventCoupleService->update(
                    $request->groom_id,
                    $fk_event,
                    'groom',
                    $request->groom_fullname,
                    $request->groom_nickname,
                    $request->groom_child,
                    $request->groom_father,
                    $request->groom_mother,
                    $request->file('groom_photo'),
                    $request->groom_address,
                    $request->groom_instagram,
                    $request->groom_facebook,
                    $request->groom_twitter,                      
                );

                $bride = $this->eventCoupleService->update(
                    $request->bride_id,
                    $fk_event,
                    'bride',
                    $request->bride_fullname,
                    $request->bride_nickname,
                    $request->bride_child,
                    $request->bride_father,
                    $request->bride_mother,
                    $request->file('bride_photo'),
                    $request->bride_address,
                    $request->bride_instagram,
                    $request->bride_facebook,
                    $request->bride_twitter,                      
                );
            }else{
                $groom = $this->eventCoupleService->create(
                                $fk_event,
                                'groom',
                                $request->groom_fullname,
                                $request->groom_nickname,
                                $request->groom_child,
                                $request->groom_father,
                                $request->groom_mother,
                                $request->file('groom_photo'),
                                $request->groom_address,
                                $request->groom_instagram,
                                $request->groom_facebook,
                                $request->groom_twitter,                      
                            );
    
                $bride = $this->eventCoupleService->create(
                                $fk_event,
                                'bride',
                                $request->bride_fullname,
                                $request->bride_nickname,
                                $request->bride_child,
                                $request->bride_father,
                                $request->bride_mother,
                                $request->file('bride_photo'),
                                $request->bride_address,
                                $request->bride_instagram,
                                $request->bride_facebook,
                                $request->bride_twitter,                      
                            );
            }
    
            return redirect()->route('location.edit',[$fk_event])->with('success','Event updated successfully');
        }catch( \Exception $e) {
            dd($e);
            return redirect()->route('couple.edit',[$fk_event])->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
