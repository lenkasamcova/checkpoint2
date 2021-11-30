<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * The attributes that are mass assignable.
	 */
	protected $fillable = [
		'text', 'post_id', 'user_id' 
	];

	/**
	 * Get the author of the comment;
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get post this comment belongs to.
	 */
	public function post()
	{
		return $this->belongsTo('App\Post');
	}
}
