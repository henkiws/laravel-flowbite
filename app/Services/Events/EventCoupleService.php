<?php

namespace App\Services\Events;

use App\Models\EventCouple;
use App\Traits\FileUploadTrait;

class EventCoupleService {

    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return EventCouple::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return EventCouple::select('id','fk_event','type','name','nickname','child','father','mother','photo','address','instagram','facebook','twitter','created_by')->find($id);
    }

    public function fetchByType($type,$fk_event)
    {   
        return EventCouple::select('id','fk_event','type','name','nickname','child','father','mother','photo','address','instagram','facebook','twitter','created_by')->where('type',$type)->where('fk_event',$fk_event)->first();
    }

    public function create(
        int $fk_event,
        string $type,
        string $name,
        string $nickname,
        int $child,
        string $father,
        string $mother,
        $image,
        string $address,
        string $instagram,
        string $facebook,
        string $twitter
        ): EventCouple
    {
        // upload file
        $file = $this->uploadFile($image, 'events/'.$fk_event);

        $result = EventCouple::create([
            'fk_event' => $fk_event,
            'type' => $type,
            'name' => $name,
            'nickname' => $nickname,
            'child' => $child,
            'father' => $father,
            'mother' => $mother,
            'photo' => $file['path']??'',
            'address' => $address,
            'instagram' => $instagram,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        int $fk_event,
        string $type,
        string $name,
        string $nickname,
        int $child,
        string $father,
        string $mother,
        $image,
        string $address,
        string $instagram,
        string $facebook,
        string $twitter
        ): EventCouple
    {
        // upload file
        if( isset($image) ) {
            $file = $this->uploadFile($image, 'events/'.$fk_event);
        }

        $result = EventCouple::where('id',$id)->where('fk_event',$fk_event)->first();
        $data = [
            'fk_event' => $fk_event,
            'type' => $type,
            'name' => $name,
            'nickname' => $nickname,
            'child' => $child,
            'father' => $father,
            'mother' => $mother,
            'address' => $address,
            'instagram' => $instagram,
            'facebook' => $facebook,
            'twitter' => $twitter,
        ];

        if( isset($file['path']) ) {
            $data['photo'] = $file['path'];
        }

        $result->update($data);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = EventCouple::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = EventCouple::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}