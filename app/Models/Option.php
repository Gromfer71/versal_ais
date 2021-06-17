<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	const OPTION_ICONS_PATH = 'img/optionIcons';

    protected $guarded = [];

    public function getPrice()
    {
    	return $this->price;
    }

    public function getIconPath()
    {
    	return self::OPTION_ICONS_PATH.'/'.$this->icon.'.png';
    }


}
