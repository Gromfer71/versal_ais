<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded    = [];
    public    $timestamps = false;

    public function optionsToString()
    {
        $this->options = implode(
            ', ',
            collect(json_decode($this->options))->map(
                function ($item) {
                    return Option::find($item)->name ?? null;
                }
            )->toArray()
        );
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'hotel_option', 'hotel_id', 'option_id');
    }
}
