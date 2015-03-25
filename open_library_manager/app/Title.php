<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model {

	protected $fillable = ['name', 'year', 'note', 'title_type_id'];
	
	public function authors()
        {
            return $this->belongsToMany('App\Author', 'author_title');
        }

}
