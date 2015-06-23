<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function owner() {
		return $this->belongsTo('App\User', 'id');
	}

	public function auction() {
		return $this->belongsTo('App\Models\Auction', 'id');
	}

}
