<?php

namespace App\Services\Users;

use Spatie\Permission\Models\Role;

class RoleService {

    public function paginate($paginate = 10)
    {   
        return Role::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Role::select('id','name')->find($id);
    }

    public function create(
        string $name
        ): Role
    {
        $result = Role::create(['name' => $name]);
        return $result;
    }

    public function update(
        int $id,
        string $name
        ): Role
    {
        $result = Role::where('id',$id)->first();
        $result->update(['name' => $name]);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = Role::where('id',$id)->delete();
        return 1;
    }

    public function formList($name, $select2 = 0): string 
    {
        $roles = Role::select('id','name')->get();
        $options = '';
        foreach( $roles as $key => $val ) {
            $options .= '<option value="'.$val->name.'" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">'.$val->name.'</option>';
        }
        $form = '<select name="'.$name.'" id="'.$name.'" class="form-control '.($select2?'select2':'').' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">'.$options.'</select>';

        return $form;
    }

}