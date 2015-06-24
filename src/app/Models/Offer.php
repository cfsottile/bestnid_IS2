<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Offer extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['reason', 'owner_id', 'auction_id', 'amount'];

	public function owner() {
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function auction() {
		return $this->belongsTo('App\Models\Auction', 'auction_id');
	}

	public function formatedCreationDate(){
		return date('d m Y - h:i',strtotime($this->created_at));
	}

	public static function validate($data){

		return Validator::make($data, [
			'reason' => 'required|string|min:2|max:1024',
			'amount' => 'required|numeric|min:1|max:99999999999999999999,99'
			]);

	}

}
