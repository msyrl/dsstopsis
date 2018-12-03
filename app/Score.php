<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
    	'alternative_id', 'criteria_id', 'score',
    ];

    public function alternative()
    {
    	return $this->belongsTo('App\Alternative');
    }

    public function criteria()
    {
    	return $this->belongsTo('App\Criteria');
    }
}
