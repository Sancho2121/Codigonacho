<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AppSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

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

        $admin = Role::create(['name' => 'administrador']);
        $usuario = Role::create(['name' => 'usuario']);
        $permissions = [
            'create',
            'read',
            'update',
            'delete'
        ];
        //CREAR PERMISOS
        foreach (Role::where('name','usuario')->get() as $rol) {
            foreach ($permissions as $p) {
                Permission::create(['name' => $rol->name.'.'.$p])->assignRole($usuario);
            }
        }
        foreach (Role::where('name','administrador')->get() as $rol) {
            foreach ($permissions as $p) {
                Permission::create(['name' => $rol->name.'.'.$p])->assignRole($admin);
            }
        }



        $administrador = User::factory()->create([
            'name'=> 'Hector Manuel',
            'surname'=>'Gutierrez Serrano',
            'email'=>'hector.gutierrez@deltaproyectos.com',
            'password'=>Hash::make('Gut13rr3z@2020')
        ])->assignRole('administrador');

        User::factory()->create([
            'name'=> 'Ignacio',
            'surname'=>'Olvera Reza',
            'email'=>'ignacio.olvera@deltaproyectos.com',
            'password'=>Hash::make('Olv3r4@2020')
        ])->assignRole('administrador');

        AppSetting::create([
            'app_name'=> 'SIGEVO',
            'app_shortname'=>'SGV',
            'app_weburl'=>'sigevo.com',
            'app_logo'=> 'images/settings/app_logo.png',
            'app_favicon'=> 'images/settings/app_favicon.png',
            //'app_wallpaper'=> null,
            'app_color'=> 'dark',
        ]);
    }
}
