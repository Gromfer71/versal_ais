<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tour()
    {
        return $this->hasOne(Tour::class, 'id', 'tour_id');
    }
}
