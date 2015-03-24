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
                $this->call('Title_typesTableSeeder');
		$this->call('TitlesTableSeeder');
                $this->call('Author_titleTableSeeder');
		
	}

}
