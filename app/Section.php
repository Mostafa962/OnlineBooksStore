<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
   use Illuminate\Database\Eloquent\SoftDeletes;
class Section extends Model
{
	use SoftDeletes;
    protected $fillable = ['section_name','section_cover'];
   	public function books(){
		//if you not change sction_id and id ,you delete change it
		return $this->hasMany('App\Book');
	}
}
