<?php

namespace App\Services\Events;

use App\Models\Event;
use App\Traits\FileUploadTrait;

class EventService {

    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return Event::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Event::select('id','name','title','slug','initial_name','fk_event_group','fk_template',
                    'fk_music','view_template','quotes','event_date','event_expired','is_demo','is_featured',
                    'show_prokes','active','created_by')->find($id);
    }

    public function create(
        string $title,
        string $name,
        string $initial_name,
        int $fk_event_group,
        int $fk_template,
        int $fk_music,
        string $quotes,
        string $event_date,
        int $show_prokes
        ): Event
    {
        $result = Event::create([
            'title' => $title,
            'name' => $name,
            'initial_name' => $initial_name,
            'fk_event_group' => $fk_event_group,
            'fk_template' => $fk_template,
            'fk_music' => $fk_music,
            'quotes' => $quotes,
            'event_date' => $event_date,
            'show_prokes' => $show_prokes??0,
            'active' => 1, // default active
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        string $title,
        string $name,
        string $initial_name,
        int $fk_event_group,
        int $fk_template,
        int $fk_music,
        string $quotes,
        string $event_date,
        int $show_prokes
        ): Event
    {

        $result = Event::where('id',$id)->first();
        $data = [
            'title' => $title,
            'name' => $name,
            'initial_name' => $initial_name,
            'fk_event_group' => $fk_event_group,
            'fk_template' => $fk_template,
            'fk_music' => $fk_music,
            'quotes' => $quotes,
            'event_date' => $event_date,
            'show_prokes' => $show_prokes??0,
            'active' => 1, // default active
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
        $result = Event::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = Event::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}