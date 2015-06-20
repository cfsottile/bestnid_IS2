<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'last_name', 'email', 'password', 'dni','born_date','phone','cc_data'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token','cc_data', 'is_admin'];

	public function isDeleteable(){

		$user_auctions = $this->auctions();
		$active_auctions = 0;
		foreach ($user_auctions as $auction){

			if ( $auction->isDeleteable() ) {
				 $active_auction += 1; }
		}

		if ($active_auctions > 0){

			return false;

		} else {

			return true;

		}

	}


	public function auctions(){

			return $this->hasMany('App\Models\Auction');

	}

	public function comments(){

			return $this->hasMany('App\Models\Comment');

	}

	public function offers(){

			return $this->hasMany('App\Models\Offer');

	}






}
