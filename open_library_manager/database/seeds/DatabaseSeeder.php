<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AuthorsTableSeeder');
		$this->call('Author_titleTableSeeder');
		$this->call('TitlesTableSeeder');
		$this->call('Title_typesTableSeeder');
		
	}

}
