<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    protected $fillable = [
      'title','content','description','link','category_id','user_id','pubDate'
    ];
    protected $hidden = [
      'post_id'
    ];
    public function User(){
        return $this->belongsTo('App\post','id','user_id');
    }
}
