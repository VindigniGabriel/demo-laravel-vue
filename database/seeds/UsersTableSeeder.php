<?php

use Illuminate\Database\Seeder;
use App\Laravue\Acl;
use App\Laravue\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userList = [
            "Yessica Peréz",
            "Matheus Roolf",
            "Elias Vindigni"
        ];

        foreach ($userList as $fullName) {
            $name = str_replace(' ', '.', $fullName);
            $roleName =  Acl::ROLE_USER;
            
            $user = \App\Laravue\Models\User::create([
                'name' => $fullName,
                'email' => strtolower($name) . '@vindigni.dev',
                'password' => \Illuminate\Support\Facades\Hash::make('secret1234'),
            ]);

            $role = Role::findByName($roleName);
            $user->syncRoles($role);
        }
    }
}
