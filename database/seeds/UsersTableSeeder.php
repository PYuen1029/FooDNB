<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database ------------------------------------------
        DB::table('users')->delete();

        //create some records-----------------------------
        $user1 = User::create(array(
        	'name' => "StephenHarper",
        	'email' => "GoCanada@gmail.com",
        	'password' => bcrypt("canada"),
        	));

        $user2 = User::create(array(
        	'name' => "Modi",
        	'email' => "GoIndia@gmail.com",
        	'password' => bcrypt("india"),
        	));

        $user3 = User::create(array(
        	'name' => "ShinzoAbe",
        	'email' => "GoJapan@gmail.com",
        	'password' => bcrypt("japan"),
        	));

        $user4 = User::create(array(
        	'name' => "XiJinPing",
        	'email' => "GoChina@gmail.com",
        	'password' => bcrypt("china"),
        	));

    }
}
