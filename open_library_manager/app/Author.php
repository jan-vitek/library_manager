<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'birth_year', 'password'];
	
	
        public function titles()
        {
            return $this->belongsToMany('App\Title', 'author_title');
        }

}
