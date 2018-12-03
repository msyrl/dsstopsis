<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $fillable = [
    	'name', 'phone_number', 'address',
    ];

    public function scores()
    {
    	return $this->hasMany('App\Score')->orderBy('criteria_id','ASC');
    }

}