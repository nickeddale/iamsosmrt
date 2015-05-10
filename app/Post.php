<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'title',
		'tagline',
		'category_id',
		'content',
		'photo_name'
	];

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

}
