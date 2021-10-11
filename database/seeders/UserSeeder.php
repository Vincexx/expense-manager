<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
                    'name' => "Charles Pitagan",
                    'email' => "charles@gmail.com",
                    'password' => bcrypt('password')
                ]);

        $user1->roles()->attach(Role::findOrFail(1));

        $user2 = User::create([
            'name' => "Sample Testing",
            'email' => "sample@gmail.com",
            'password' => bcrypt('password'),
        ]);

        $user2->roles()->attach(Role::findOrFail(2));
    }
}
