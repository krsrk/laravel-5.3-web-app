<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//factory('App\User', 3)->create();
        Model::unguard();

  	//$this->call(UserTableSeeder::class);
  	$this->call(PostTableSeeder::class);
  		//$this->call(PostCommentTableSeeder::class);

  	Model::reguard();
    }
}
