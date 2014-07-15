<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

	  DB::table('users')->truncate();

	  $users = array(
	  
	  	  array(
              'prenom'     => 'Cindy',
              'nom'        => 'Leschaud',
              'email'      => 'cindy.leschaud@gmail.com',
              'username'   => 'cindy.leschaud@gmail.com',
              'password'   =>  Hash::make('secret'),
			  'activated'  => 1,
              'created_at' => date('Y-m-d G:i:s'),
			  'updated_at' => date('Y-m-d G:i:s') 
          ),
          array(
              'prenom'     => 'User',
              'nom'        => 'Username',
              'email'      => 'user@user.com',
              'username'   => 'user@user.com',
              'password'   =>  Hash::make('password'),
			  'activated'  => 1,
              'created_at' => date('Y-m-d G:i:s'),
			  'updated_at' => date('Y-m-d G:i:s') 
          )
          
      );
 
      DB::table('users')->insert($users);

	}

}
