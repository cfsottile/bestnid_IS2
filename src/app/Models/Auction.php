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
	protected $fillable = ['endDate', 'description'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = [];

	public function owner() {
		return $this->belongsTo('App\User');
	}

	public function winner() {
		return $this->belongsTo('App\User');
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

//Dice que no encuentra la clase DateTime y es nativa de php. 
//revisar funciones
	public function contDayEnd(){
        $datetime1 = new DateTime(substr($this->end_date, 0, 10));
        $datetime2 = new DateTime("now");
        $interval = $datetime2->diff($datetime1);
        /*return $interval->format('%a días');*/
        return 5;
    }

}
/*		$datetime1 = new DateTime($this->end_date);
        $datetime2 = new DateTime("now");
        $interval = $datetime2->diff($datetime1);
        return ($interval->format('%a días'));*/