<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bryse Meijer',
            'email' => 'me@bryse.net',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);
    }
}
