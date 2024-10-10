<?php

namespace App\Services\Master;

use App\Models\Type;
use App\Traits\FileUploadTrait;

class TypeService {
    
    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return Type::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Type::select('id','name','description','image','active','created_by')->find($id);
    }

    public function create(
        string $name,
        string $description,
        $image,
        int $active
        ): Type
    {
        // upload file
        if( isset($iamge) ) {
            $file = $this->uploadFile($image, 'mp3');
        }

        $result = Type::create([
            'name' => $name,
            'description' => $description,
            'image' => $file['image']??'',
            'active' => $active,
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
        ): Type
    {
        // upload file
        if( isset($image) ) {
            $file = $this->uploadFile($image, 'mp3');
        }

        $result = Type::where('id',$id)->first();
        $data = [
            'name' => $name,
            'description' => $description,
            'active' => $active,
        ];

        if( isset($file['image']) ) {
            $data['image'] = $file['image'];
        }

        $result->update($data);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = Type::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $selected = 0): string 
    {
        $roles = Type::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->id.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" '.($selected == $val->id ? "selected" : "").'>'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}