<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalField extends Model {

	protected $fillable = ['char_value', 'int_value', 'additional_field_type_id', 'title_id'];

}
