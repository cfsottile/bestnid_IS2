<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use Carbon\Carbon;

class Comment extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['content', 'owner_id', 'auction_id', 'response', 'response_date'];

	public function owner() {
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function auction() {
		return $this->belongsTo('App\User', 'auction_id');
	}

	public function formatedCreationDate(){
		return date('d/m/Y H:i',strtotime($this->created_at));
	}

	public function formatedResponseDate(){
		return date('d/m/Y H:i',strtotime($this->response_date));
	}

	public function respond($data){

		$this->response_date = Carbon::now();
		$this->response = $data['response'];
		$this->save();

	}

	public function edit($data){

		$this->content = $data['content'];
		$this->created_at = Carbon::now();
		$this->save();

	}

	public static function validate($data) {
		return Validator::make($data, [
			'content' => 'required|string|min:2|max:511',
			]);
	}

	public static function validateResponse($data) {

		return Validator::make($data, [
			'response' => 'required|string|min:2|max:511',
			]);

	}


}
