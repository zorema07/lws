<?php
class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();

	    // Create the user
	    $user = User::create(array(
	    	'fullname' 	=> 'Administrator',
	        'username'  => 'admin',
	        'password'  => Hash::make('pass'),
	        'email' 	=>'admin@mail.com'
	    ));
	}
}