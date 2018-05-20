<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
        	'name' => 'Samet SELKİ',
        	'email' => 'samedselki@gmail.com',
        	'password' => bcrypt('SAMSUNSPOR0055')
        ]);

        DB::table('role_user')->insert(['role_id' => 1, 'user_id' => 1]);
        DB::table('role_user')->insert(['role_id' => 2, 'user_id' => 1]);
        DB::table('role_user')->insert(['role_id' => 3, 'user_id' => 1]);
    }
}
