<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function auctions() {
		return $this->hasMany('App\Auction');
	}

	public function scopeIdForName($query, $name) {
		return $query->where('name', '=', $name)->get();
	}
}
