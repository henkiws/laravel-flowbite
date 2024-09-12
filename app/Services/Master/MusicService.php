<?php

namespace App\Services\Master;

use App\Models\Music;

class MusicService {

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
        string $path,
        int $active
        ): Music
    {
        $result = Music::create([
            'name' => $name,
            'description' => $description,
            'path' => $path,
            'active' => $active,
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        string $name,
        string $description,
        string $path,
        int $active
        ): Music
    {
        $result = Music::where('id',$id)->first();
        $result->update([
            'name' => $name,
            'description' => $description,
            'path' => $path,
            'active' => $active,
        ]);
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
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' w-full mt-2">'.$options.'</select>';

        return $form;
    }

}