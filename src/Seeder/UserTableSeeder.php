<?php

namespace Gayly\Leaf\Seeder;

use Illuminate\Database\Seeder;
use Gayly\Leaf\Auth\Models\LeafUser;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        LeafUser::truncate();
        LeafUser::create([
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'email' =>  'admin@demo',
            'name'      => 'Administrator',
        ]);
    }
}
