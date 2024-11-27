<?php

namespace App\Services\Events;

use App\Models\EventGallery;
use App\Traits\FileUploadTrait;

class EventGalleryService {

    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return EventGallery::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return EventGallery::select('id','fk_event','name','path','position','active','created_by')->find($id);
    }

    public function fetchByEvent($fk_event)
    {   
        return EventGallery::select('id','fk_event','name','path','position','active','created_by')->where('fk_event',$fk_event)->get();
    }

    public function create(
        int $fk_event,
        string $type,
        string $name,
        $image
        ): EventGallery
    {
        // upload file
        $file = $this->uploadFile($image, 'events/'.$fk_event);

        $result = EventGallery::create([
            'fk_event' => $fk_event,
            'type' => $type,
            'name' => $name,
            'path' => $file['path']??'',
            'active' => 1,
            'position' => $this->eventGalleryLastPosition($fk_event),
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        string $name,
        string $description,
        $image,
        int $active
        ): EventGallery
    {
        // upload file
        if( isset($image) ) {
            $file = $this->uploadFile($image, 'banks');
        }

        $result = EventGallery::where('id',$id)->first();
        $data = [
            'name' => $name,
            'description' => $description,
            'active' => $active,
        ];

        if( isset($file['path']) ) {
            $data['image'] = $file['path'];
        }

        $result->update($data);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = EventGallery::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = EventGallery::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

    public function eventGalleryLastPosition($fk_event) {
        return EventGallery::where('fk_event',$fk_event)->count()+1;
    }

}