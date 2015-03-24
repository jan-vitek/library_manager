<?php

use Illuminate\Database\Seeder;

class Author_titleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('author_title')->delete();

		$author_title = array(
			['id' => 1, 'author_id' => 1, 'title_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'author_id' => 2, 'title_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 3, 'author_id' => 3, 'title_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 4, 'author_id' => 4, 'title_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'author_id' => 4, 'title_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 6, 'author_id' => 5, 'title_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
		
		DB::table('author_title')->insert($author_title);
	}

}
