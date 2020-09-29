<?php

use Illuminate\Database\Seeder;
use App\User;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::create([
            'name' => 'Chris Rotaeche',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
