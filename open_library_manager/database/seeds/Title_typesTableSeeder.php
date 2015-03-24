<?php

use Illuminate\Database\Seeder;

class Title_typesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('title_types')->delete();

		$title_types = array(
			['id' => 1, 'name' => 'bachelor thesis', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'name' => 'journal', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 3, 'name' => 'book', 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
		
		DB::table('title_types')->insert($title_types);
	}

}
