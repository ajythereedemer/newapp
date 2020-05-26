<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';
	
	public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
	
	public function users()
    {
        return $this->belongsTo('App\Users','user_id','user_id');
    }
}
