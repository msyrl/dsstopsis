<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
    	'name', 'weight',
    ];

    public function scores()
    {
    	return $this->hasMany('App\Score');
    }

}
