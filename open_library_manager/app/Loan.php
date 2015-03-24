<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {

	protected $fillable = ['note', 'expires_at', 'returned_at', 'copy_id'];

}
