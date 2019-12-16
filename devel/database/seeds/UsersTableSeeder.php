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

        $devel = User::create([
            'name' => 'Devel',
            'lname' => 'Priezvisko',
            'email' => 'devel@devel.sk',
            'password' => bcrypt('password2')
        ]);

        $student = User::create([
            'name' => 'Student',
            'lname' => 'Mrkvicka',
            'email' => 'student@student.sk',
            'password' => bcrypt('password1')
        ]);

        $student2 = User::create([
            'name' => 'Richard',
            'lname' => 'Pekár',
            'email' => 'rpekar@student.sk',
            'password' => bcrypt('student2')
        ]);

        $student3 = User::create([
            'name' => 'Vojtech',
            'lname' => 'Pokorný',
            'email' => 'vpokorny@student.sk',
            'password' => bcrypt('student3')
        ]);

        $student4 = User::create([
            'name' => 'Helena',
            'lname' => 'Bartková',
            'email' => 'hbartkova@student.sk',
            'password' => bcrypt('student4')
        ]);

        $student5 = User::create([
            'name' => 'Zora',
            'lname' => 'Smreková',
            'email' => 'zsmrekova@student.sk',
            'password' => bcrypt('student5')
        ]);

        $student6 = User::create([
            'name' => 'Miloš',
            'lname' => 'Baník',
            'email' => 'mbanik@student.sk',
            'password' => bcrypt('student6')
        ]);

        $student7 = User::create([
            'name' => 'Štefan',
            'lname' => 'Koreň',
            'email' => 'skoren@student.sk',
            'password' => bcrypt('student7')
        ]);

        $student8 = User::create([
            'name' => 'Filip',
            'lname' => 'Skalický',
            'email' => 'fskalicky@student.sk',
            'password' => bcrypt('student8')
        ]);

        $student9 = User::create([
            'name' => 'Stanislav',
            'lname' => 'Bosko',
            'email' => 'sbosko@student.sk',
            'password' => bcrypt('student9')
        ]);

        $student10 = User::create([
            'name' => 'Alena',
            'lname' => 'Chlebovcová',
            'email' => 'achlebovcova@student.sk',
            'password' => bcrypt('student10')
        ]);


        $admin->Roles()->attach($adminRole);
        $student->Roles()->attach($studentRole);
        $student2->Roles()->attach($studentRole);
        $student3->Roles()->attach($studentRole);
        $student4->Roles()->attach($studentRole);
        $student5->Roles()->attach($studentRole);
        $student6->Roles()->attach($studentRole);
        $student7->Roles()->attach($studentRole);
        $student8->Roles()->attach($studentRole);
        $student9->Roles()->attach($studentRole);
        $student10->Roles()->attach($studentRole);
        $devel->Roles()->attach($develRole);

    }
}
