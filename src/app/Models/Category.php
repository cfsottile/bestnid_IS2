<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function auctions() {
		return $this->hasMany('App\Models\Auction');
	}

	public function scopeIdForName($query, $name) {
		return $query->where('name', '=', $name)->get();
	}

	public static function names () {
		$all = Category::all();
		$names = [];
		$i = 0;
		foreach ($all as $c) {
			$names[$i++] = $c->name;

		}
		return $names;
	}
}
