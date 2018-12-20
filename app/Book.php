<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use App\Book_Author;
class Book extends Model
{
   	use SoftDeletes;
	protected $fillable = ['section_id','edition','title','publication','description','book_cover','book_pdf'];

    public function section(){
		//if you not change sction_id and id ,you delete change it
		return $this->belongsTo('App\Section','foreign_key');
	}
   	public function authors(){
		//if you not change sction_id and id ,you delete change it
		return $this->belongsToMany('App\Author','book_authors','book_id','author_id');
	}
}
