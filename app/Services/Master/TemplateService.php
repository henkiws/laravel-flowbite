<?php

namespace App\Services\Master;

use App\Models\Template;

class TemplateService {

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
        string $image,
        float $original_price,
        float $markup_price,
        float $discount,
        int $is_featured,
        int $active,
        ): Template
    {
        $result = Template::create([
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
            'created_by' => auth()->user()->id
        ]);
        return $result;
    }

    public function update(
        int $id,
        string $name,
        string $description,
        string $path,
        string $image,
        float $original_price,
        float $markup_price,
        float $discount,
        int $is_featured,
        int $active,
        ): Template
    {
        $result = Template::where('id',$id)->first();
        $result->update([
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
        ]);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = Template::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = Template::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' w-full mt-2">'.$options.'</select>';

        return $form;
    }

}