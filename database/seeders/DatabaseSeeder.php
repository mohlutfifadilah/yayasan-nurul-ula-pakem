<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jenjang;
use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $role = ['admin-PAUD', 'admin-RA', 'admin-MI'];

        $user_roles = [2, 3, 4];
        $user_email = [
            'adminPAUD@admin.com',
            'adminRA@admin.com',
            'adminMI@admin.com',
        ];
        $user_profil = [1, 2, 3];
        $user_password = [
            'adminPAUD02',
            'adminRA03',
            'adminMI04',
        ];

        $profil_nama = ['PAUD', 'RA', 'MI'];

        // SUPERADMIN
        User::create([
            'id_role' => 1,
            'id_profil' => null,
            'foto' => null,
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('superadmin01'),
        ]);

        Role::create([
            'nama_role' => 'superadmin',
        ]);

        // Role

        foreach($role as $r){
            Role::create([
                'nama_role' => $r,
            ]);
        }

        // Users


        foreach($user_roles as $index => $user_role){
            User::create([
                'id_role' => $user_role,
                'id_profil' => $user_profil[$index],
                'foto' => null,
                'email' => $user_email[$index],
                'password' => Hash::make($user_password[$index]),
            ]);
        }

        // Jenjang

        foreach($profil_nama as $p){
            Profil::create([
                'nama' => $p,
            ]);
        }
    }
}
