<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = "Administrador";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("administrador123");
        $user->role = 0;
        $user->save();

        $user = new User();

        $user->name = "Luciano";
        $user->email = "luciano@gmail.com";
        $user->password = bcrypt("lucho123");
        $user->role = 1;
        $user->save();

        $user = new User();

        $user->name = "Samus";
        $user->email = "samus@gmail.com";
        $user->password = bcrypt("samus123");
        $user->role = 1;
        $user->save();
    }
}
