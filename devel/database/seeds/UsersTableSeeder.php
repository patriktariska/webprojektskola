<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $adminRole = Role::where(['name' => 'admin'])->first();
        $studentRole = Role::where(['name' => 'student'])->first();
        $develRole = Role::where(['name' => 'devel'])->first();

        $admin = User::create([
            'name' => 'Admin',
            'lname' => 'Priezvisko',
            'email' => 'admin@admin.sk',
            'password' => bcrypt('password')
        ]);

        $student = User::create([
            'name' => 'Student',
            'lname' => 'Mrkvicka',
            'email' => 'student@student.sk',
            'password' => bcrypt('password1')
        ]);

        $devel = User::create([
            'name' => 'Devel',
            'lname' => 'Priezvisko',
            'email' => 'devel@devel.sk',
            'password' => bcrypt('password2')
        ]);

        $admin->Roles()->attach($adminRole);
        $student->Roles()->attach($studentRole);
        $devel->Roles()->attach($develRole);

    }
}
