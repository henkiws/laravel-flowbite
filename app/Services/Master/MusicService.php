<?php

namespace App\Services\Master;

use App\Models\Music;
use App\Traits\FileUploadTrait;

class MusicService {
    
    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return Music::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Music::select('id','name','description','path','active','created_by')->find($id);
    }

    public function create(
        string $name,
        string $description,
        $music,
        int $active
        ): Music
    {
        // upload file
        $file = $this->uploadFile($music, 'mp3');

        $result = Music::create([
            'name' => $name,
            'description' => $description,
            'path' => $file['path']??'',
            'active' => $active,
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        string $name,
        string $description,
        $music,
        int $active
        ): Music
    {
        // upload file
        if( isset($music) ) {
            $file = $this->uploadFile($music, 'mp3');
        }

        $result = Music::where('id',$id)->first();
        $data = [
            'name' => $name,
            'description' => $description,
            'active' => $active,
        ];

        if( isset($file['path']) ) {
            $data['path'] = $file['path'];
        }

        $result->update($data);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = Music::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = Music::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}