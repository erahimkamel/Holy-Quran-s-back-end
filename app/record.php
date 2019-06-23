<?php

namespace App;
use App\reader;
use Illuminate\Database\Eloquent\Model;

class record extends Model
{
  protected  $fillable =['URL','index','record'];

  public function reader()
  {
      return $this->belongsTo(reader::class);
  }
}
