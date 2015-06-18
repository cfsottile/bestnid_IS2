<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auctions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'end_date', 'description', 'owner_id', 'category_id', 'picture'];

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
		return $this->belongsTo('App\Category');
	}

	public function offers() {
		return $this->hasMany('App\Auction');
	}

	public function comments() {
		return $this->hasMany('App\Comment');
	}

	public function pictureUrl() {
		return asset('images/'.$this->picture);
	}

	public function scopeNameIncludes($query, $string) {
		return $query->where('name', 'LIKE', '%'.$string.'%');
	}

	public function scopeCurrents ($query) {
		return $query->where('end_date', '>', Date('Y/m/d H:i:s'));
	}

	public function scopeIsOfCategory($query, $categoryId) {
		return $query->where('category_id', '=', $categoryId);
	}

	public function remainingDays(){
		return (new \DateTime($this->end_date))->diff(new \DateTime("now"))->d;
    }

	public static function rules () {
		return [
			'name' => 'required|string|max:255|min:3',
			'description' => 'required',
			'owner_id' => 'required|exists:users,id',
			'category_id' => 'required|exists:categories,id',
			'end_date' => 'required',
			'picture' => 'required|string|min:4'
		];
	}

}
