<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Nemanja Martic',
        //     'email' => 'nemanja.martic@gmail.com',
        //     'password' => bcrypt('nemanja11')
        // ]);

        $user = User::create([
            'name' => 'Nemanja Martic',
            'email' => 'nemanja.martic@gmail.com',
            'password' => bcrypt('nemanja11')
        ]);

        $user->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'Bhuvandas Road NH14 Dadar, Mumbai'
        ]);

        $user->restaurants()->create([
            'name' => 'Mainland China',
            'location' => 'Platinum Tech Park Vashi, Navi Mumbai'
        ]);

        $user->restaurants()->create([
            'name' => 'Mukesh Lunch Home',
            'location' => 'Sai Balaji Tower, Airoli Navi Mumbai'
        ]);
    }
}
