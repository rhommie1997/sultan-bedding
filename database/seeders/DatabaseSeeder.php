<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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

        User::create([
            'name' => 'Rommy Julianto',
            'email' => 'rhommie.1997@gmail.com',
            'username' => 'rhommie1997',
            'password' => bcrypt('rhommie19')
        ]);

        User::create([
            'name' => 'Killua Zoldyck',
            'email' => 'killua.zoldyck@gmail.com',
            'username' => 'killua123',
            'password' => bcrypt('12345')
        ]);


    }
}
