<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_author = Role::where('name','Author')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->email = 'victor@gmail.com';
        $user->password = bcrypt('victor');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->email = 'elitsa@gmail.com';
        $admin->password = bcrypt('elicav');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->email = 'krisi@gmail.com';
        $author->password = bcrypt('krisi');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
