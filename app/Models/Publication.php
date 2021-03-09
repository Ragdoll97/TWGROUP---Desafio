<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table = 'publications';
    protected $hidden = ['created_at','updated_at'];


    public function comments(){
        # Una publicación tiene 0 o más comentarios
      return $this->hasMany(Comment::class, 'publication_id','id');
  }

  public function user()
{
return $this->belongsTo('app\Models\User');
}
}
