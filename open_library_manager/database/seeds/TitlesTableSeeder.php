<?php

use Illuminate\Database\Seeder;

class TitlesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('titles')->delete();

		$titles = array(
			['id' => 1, 'name' => 'Korekce pohybů hlavy při vyšetření sledování očních pohybů', 'year' => 2014, 'title_type_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'name' => 'Technologie hlasových komunikací', 'year' => 2007, 'title_type_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 3, 'name' => 'Umělá inteligence (1)', 'year' => 1993, 'title_type_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 4, 'name' => 'Umělá inteligence (2)', 'year' => 1997, 'title_type_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'name' => 'A distributed mincut/maxflow algorithm combining path augmentation and push-relabel.', 'year' => 2013, 'title_type_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
		
		DB::table('titles')->insert($titles);
	}

}
