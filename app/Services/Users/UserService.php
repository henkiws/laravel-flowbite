<?php

namespace App\Services\Users;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService {

    public function paginate($paginate = 10)
    {   
        return User::paginate($paginate);
    }


    public function fetchById($id)
    {   
        return User::find($id);
    }

    public function create(
        string $name,
        string $email,
        string $password,
        string $role,
        ): User
    {
        $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        
        // assign role user
        $user->assignRole($role);

        return $user;
    }

    public function update(
        int $id,
        string $name,
        string $email,
        string $password,
        string $role,
        ): User
    {
        $user = User::where('id',$id)->first();
        $data = [
            'name' => $name,
            'email' => $email
        ];
        if( !empty($password) ) {
            $data['password'] = Hash::make($password);
        }
        $user->update($data);

        // assign role user
        $user->assignRole($role);

        return $user;
    }

    public function delete(
        int $id
        ): int
    {
        $result = User::where('id',$id)->delete();
        return 1;
    }

}