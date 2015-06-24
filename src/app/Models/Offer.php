<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function owner() {
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function auction() {
		return $this->belongsTo('App\Models\Auction', 'auction_id');
	}

	public function formatedCreationDate(){
		return date('d m Y - h:i',strtotime($this->created_at));
	}

	public static function validate($data) {
		return Validator::make($data, [
			'amount' => 'required|numeric|min:1',
			]);
	}

}
