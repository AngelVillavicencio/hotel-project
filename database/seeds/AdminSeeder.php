<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario de ejemplo
        User::create([
            'name' => 'Hector',
            'lastname' => 'Chumpitaz',
            'email' => 'hector@gmail.com',
            'password' => bcrypt('admin123'),
            'dni' => '72607989',
        ]);
    }
}
