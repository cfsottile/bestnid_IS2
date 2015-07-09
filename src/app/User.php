<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Mail;

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

		$user_auctions = $this->auctions;
		$active_auctions = 0;
		foreach ($user_auctions as $auction){

			if ( $auction->isDeleteable() ) {
				 $active_auctions += 1; }
		}

		if ($active_auctions > 0){

			return false;

		} else {

			return true;

		}

	}


	public function auctions(){

			return $this->hasMany('App\Models\Auction', 'owner_id');

	}

	public function wonAuctions() {

		$wonAuctions = [];
		$i = 0;
		$auctions = $this->auctions;

		foreach ($auctions as $auction)
		{
			if (isset($auction->winner)){
				if($auction->winner->id == $this->id){
					$wonAuctions[$i] = $auction;
					$i++;
				}
			}
		}
		return $wonAuctions;
	}


	public function comments(){

			return $this->hasMany('App\Models\Comment', 'owner_id');

	}

	public function offers(){

			return $this->hasMany('App\Models\Offer', 'owner_id');

	}

	public function activeOffers(){

		$offers = $this->offers;
		$requested_offers = [];
		$i = 0;

		foreach($offers as $offer) {
				if(!$offer->auction->finished()){
					$requested_offers[$i++] = $offer;
				}
		}
		return $requested_offers;
	}

	public function finalizedOffers(){

		$offers = $this->offers;
		$requested_offers = [];
		$i = 0;

		foreach($offers as $offer) {
				if($offer->auction->finished()){
					$requested_offers[$i++] = $offer;
				}
		}
		return $requested_offers;
	}

	public function winnerOffers(){

		$offers = $this->offers;
		$requested_offers = [];
		$i = 0;

		foreach($offers as $offer) {
				//dd( (!$offer->auction->finished()), (isset($offer->auction->winner_id)), $offer->auction );
				if( ($offer->auction->finished()) && (isset($offer->auction->winner_id)) ){
					if($offer->auction->winner_id == $this->id){
						$requested_offers[$i++] = $offer;
					}
				}
		}
		return $requested_offers;
	}

	public function lostOffers(){

		$offers = $this->offers;
		$requested_offers = [];
		$i = 0;

		foreach($offers as $offer) {
				if(($offer->auction->finished()) && (isset($offer->auction->winner_id))){
					if($offer->auction->winner_id != $this->id){
						$requested_offers[$i++] = $offer;
					}
				}
		}
		return $requested_offers;
	}


	public function formatedCreatedAt () {
		return date('d/m/Y H:i',strtotime($this->created_at));
	}



	public function formatedBornDate () {
		return date('d/m/Y',strtotime($this->born_date));
	}

	public function hasOfferOn($auction) {

		foreach ($auction->offers as $offer){

			if ($offer->owner_id == $this->id){
					return true;
			}
		}
		return false;
	}

	public function isAdmin(){

		if ($this->is_admin == 1) {
			return true;
		}
		return false;
	}

	public function makeAdmin() {
		$this->is_admin = 1;
		$this->save();
	}

	public function setWinner () {

	}

	public function notifyPaymentError ($auction) {
		$args = [
			'user' => $this,
			'auction' => $auction
		];

		Mail::send('emails.paymentError', $args, function($message)	{
			$message->to($this->email, $this->name." ".$this->last_name)->subject('Hubo problemas con un cobro');
		});
	}

	public function notifyWonAuction ($auction) {
		$args = [
			'winner' => $this,
			'auctionOwner' => $auction->owner,
			'auction' => $auction
		];

		Mail::send('emails.winnerNotification', $args, function($message) {
		    $message->to($this->email, $this->name." ".$this->last_name)->subject('¡Fuiste elegido ganador!');
		});
	}

	public function sendWinnerData ($auction, $offer) {
		$args = [
			'auction' => $auction,
			'offer' => $offer
		];

		Mail::send('emails.sendWinnerData', $args, function($message) {
			$message->to($this->email, $this->name." ".$this->last_name)->subject('¡Elegiste a un ganador!');
		});
	}

	public function isOwnerOfAuction($auction) {
		return $this->id == $auction->owner->id;
	}
}
