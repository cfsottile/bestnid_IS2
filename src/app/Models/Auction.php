<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Auction extends Model {

	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auctions';

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'end_date', 'description', 'owner_id', 'category_id', 'picture'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = [];

	public function owner() {
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function winner() {
		return $this->belongsTo('App\User', 'winner_id');
	}

	public function category() {
		return $this->belongsTo('App\Models\Category');
	}

	public function offers() {
		return $this->hasMany('App\Models\Offer', 'auction_id');
	}

	public function comments() {
		return $this->hasMany('App\Models\Comment', 'auction_id');
	}

	public function pictureUrl() {
		return asset('images/'.$this->picture);
	}

	public function scopeNameIncludes($query, $string) {
		return $query->where('title', 'LIKE', '%'.$string.'%');
	}

	public function scopeCurrents ($query) {
		return $query->where('end_date', '>', Date('Y/m/d H:i:s'));
	}

	public function scopeFinalizaed ($query) {
		return $query->where('end_date', '<=', Date('Y/m/d H:i:s'));
	}

	public function scopeFinalizedOnDate ($query, $date) {

		return $query->where('end_date', '<=', $date);
	}

	public function scopeIsOfCategory($query, $categoryId) {
		return $query->where('category_id', '=', $categoryId);
	}

	public function remainingDays(){
		return (new \DateTime($this->end_date))->diff(new \DateTime("now"))->d;
    }

	public function elapsedDays () {
		return floor((strtotime(Date('Y/m/d H:i:s')) - strtotime($this->created_at))/86400);
	}

	public static function initialValidate ($data) {
		return Validator::make($data, [
			'title' => 'required|string|min:3|max:255',
			'description' => 'required',
			'image' => 'required|image|mimes:jpg,jpeg,png',
			'categoryName' => 'required|string|exists:categories,name',
			'durationInDays' => 'required|integer|between:15,30'
			]);
	}

	public static function finalValidate ($data) {
		return Validator::make($data, [
			'owner_id' => 'required|exists:users,id',
			'picture' => 'required|string|min:4'
			]);
	}

	public function isDeleteable() {

		if (count($this->offers) > 0) { //si tiene ofertas

			// if ($this->end_date < Date('Y-m-d H:i:s')){ //si tiene ofertas y pero ya cerró
			//
			// 	return true;
			// }

			return false;

		} else { //si no tiene ofertas

			return true;

		}

	}

	public function formatedCreatedAt () {
		return date('d/m/Y H:i',strtotime($this->created_at));
	}

	public function formatedEndDate () {
		return date('d/m/Y H:i',strtotime($this->end_date));
	}

	public function userOffer($user){

		foreach ($this->offers as $offer){
			if($offer->owner_id == $user->id){
				return $offer;
			}
		}
		return null;

	}

	public function hasWinner() {
		return $this->winner != null;
	}

	public function finished () {
		return strtotime(Date('Y/m/d')) >= strtotime(substr($this->end_date, 0, 10));
	}


}
