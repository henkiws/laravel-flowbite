<?php

namespace App\Services\Master;

use App\Models\Template;
use App\Traits\FileUploadTrait;

class TemplateService {

    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return Template::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Template::select('name','slug','description','path','active',
                    'created_by','image','original_price','markup_price',
                    'discount','is_featured','used_count')->find($id);
    }

    public function create(
        string $name,
        string $description,
        string $path,
        $image,
        float $original_price,
        float $markup_price,
        float $discount,
        int $is_featured,
        int $active,
        ): Template
    {
        // upload file
        $file = $this->uploadFile($image, 'templates');

        $result = Template::create([
            'name' => $name,
            'description' => $description,
            'path' => $path,
            'image' => $file['path']??'',
            'original_price' => $original_price,
            'markup_price' => $markup_price,
            'discount' => $discount,
            'is_featured' => $is_featured,
            'used_count' => 0,
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
        $image,
        float $original_price,
        float $markup_price,
        float $discount,
        int $is_featured,
        int $active,
        ): Template
    {
        // upload file
        if( isset($image) ) {
            $file = $this->uploadFile($image, 'templates');
        }

        $result = Template::where('id',$id)->first();
        $data = [
            'name' => $name,
            'description' => $description,
            'path' => $path,
            'image' => $image,
            'original_price' => $original_price,
            'markup_price' => $markup_price,
            'discount' => $discount,
            'is_featured' => $is_featured,
            'used_count' => 0,
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
        $result = Template::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $selected = 0): string 
    {
        $roles = Template::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->id.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" '.($selected == $val->id ? "selected" : "").'>'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}