<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function owner() {
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function auction() {
		return $this->belongsTo('App\User', 'auction_id');
	}

}
