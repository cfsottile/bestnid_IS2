<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Category extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

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

	public function isDeleteable() {

		//logica pedorra, deberia ser algo como if(count(Auction::isOfCategory($id)->currents()->get()) > 0)

		if (count($this->auctions) > 0) {
			return false;
		} else {
			return true;
		}

	}

	public static function validate($data) {

		return Validator::make($data, [
			'name' => 'required|string|min:2|max:50',
			]);
	}

	public function actualizar($data) {

		$this->name = $data['name'];
		$this->save();
	}



}
