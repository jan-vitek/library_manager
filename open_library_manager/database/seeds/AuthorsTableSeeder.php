<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('authors')->delete();

		$authors = array(
			['id' => 1, 'name' => 'Jonáš Erlebach', 'birth_year' => 1991, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'name' => 'Doc. Ing. Petr Pollák, CSc.', 'birth_year' => 1966, 'created_at' => new DateTime, 'updated_at' => new DateTime], 
			['id' => 3, 'name' => 'Prof. Ing. Jan Uhlíř, CSc.', 'birth_year' => 1940, 'created_at' => new DateTime, 'updated_at' => new DateTime], 
			['id' => 4, 'name' => 'Prof. Ing. Vladimír Mařík, DrSc.', 'birth_year' => 1952, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'name' => 'Václav Hlaváč', 'birth_year' => 1956, 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
		
		DB::table('authors')->insert($authors);
	}

}
