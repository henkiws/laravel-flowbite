<?php

namespace App\Services\Users;

use Spatie\Permission\Models\Permission;

class PermissionService {

    public function paginate($paginate = 10)
    {   
        return Permission::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return Permission::select('id','name')->find($id);
    }

    public function create(
        string $name
        ): Permission
    {
        $result = Permission::create(['name' => $name]);
        return $result;
    }

    public function update(
        int $id,
        string $name
        ): Permission
    {
        $result = Permission::where('id',$id)->first();
        $result->update(['name' => $name]);
        return $result;
    }

    public function delete(
        int $id
        ): int
    {
        $result = Permission::where('id',$id)->delete();
        return 1;
    }

}