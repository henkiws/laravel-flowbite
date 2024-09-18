<?php

namespace App\Services\Master;

use App\Models\Bank;
use App\Traits\FileUploadTrait;

class BankService {

    use FileUploadTrait;

    public function paginate($paginate = 10)
    {   
        return Bank::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Bank::select('id','name','description','image','active','created_by')->find($id);
    }

    public function create(
        string $name,
        string $description,
        $image,
        int $active
        ): Bank
    {
        // upload file
        $file = $this->uploadFile($image, 'banks');

        $result = Bank::create([
            'name' => $name,
            'description' => $description,
            'image' => $file['path']??'',
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
        ): Bank
    {
        // upload file
        if( isset($image) ) {
            $file = $this->uploadFile($image, 'banks');
        }

        $result = Bank::where('id',$id)->first();
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
        $result = Bank::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = Bank::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' w-full mt-2">'.$options.'</select>';

        return $form;
    }

}