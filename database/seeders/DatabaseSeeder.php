<?php

namespace Database\Seeders;

use App\Models\FormationProgram;
use App\Models\StateUser;
use App\Models\Ficha;
use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use App\Models\RolesUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        StateUser::create([
            'name' => 'Activo',
        ]);

        StateUser::create([
            'name' => 'Inactivo',
        ]);

        StateUser::create([
            'name' => 'Pendiente',
        ]);

        FormationProgram::create([
            'name'=> 'Adso',
        ]);

        Ficha::create([
            'name'=> '2894667',
            'formation_program_id' => 1,
        ]);

        User::create([
            'document' => '1140424793',
            'password' => Hash::make('ABC123'),
            'state_user_id' => 1,   
        ]);

        Profile::create([
            'user_id' => 1,
            'names' => 'Edixon David',
            'last_names' => 'Castillo Torres',
            'phone' => '3227016801',
            'email' => 'edixondelta2022@gmail.com',
            'ficha_id' => 1,
        ]);

        Role::create([
            'name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'Ayudante'
        ]);

        Role::create([
            'name' => 'Instructor'
        ]);

        Role::create([
            'name' => 'Aprendiz'
        ]);

        RolesUser::create([
            'user_id' => '1',
            'role_id' => '1'
        ]);
    }
}
