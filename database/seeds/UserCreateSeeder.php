<?php

use Illuminate\Database\Seeder;

class UserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Role
        $role = new \App\Role();
        $role->name = 'admin';
        $role->display_name = 'Admin';
        $role->description = 'Admin User to access everything';
        $role->save();

        $user = new \App\User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->status = 1;
        $user->password = Hash::make('12345678');
        $user->role = $role->id;

        if ($user->save()) {
            $user->roleUpdate($role->id);
        }
    }
}
