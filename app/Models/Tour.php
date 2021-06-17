<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tour extends Model
{
	protected $table = 'tours';
	protected $guarded = [];
	public $timestamps = false;

	public function city()
	{
		return $this->hasOne(City::class, 'id', 'city_id')->withDefault();
	}


	public function hotel()
	{
		return $this->hasOne(Hotel::class, 'id', 'hotel_id')->withDefault();
	}
}
