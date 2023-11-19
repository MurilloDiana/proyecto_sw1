<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'jorge',
            'email' => 'jorge@correo.com',
            'password' => Hash::make('0000'),
            'fecha_nacimiento' => '2000-05-10',
            'ci' => '6372221',
        ]);

        User::create([
            'name' => 'carlos',
            'email' => 'carlos@correo.com',
            'password' => Hash::make('0000'),
            'fecha_nacimiento' => '2000-05-10',
            'ci' => '635551',
        ]);

        User::create([
            'name' => 'oscar',
            'email' => 'oscar@correo.com',
            'password' => Hash::make('0000'),
            'fecha_nacimiento' => '2000-05-10',
            'ci' => '63555144',
        ]);
    }
}
