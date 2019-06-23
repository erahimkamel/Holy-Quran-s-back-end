<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookmark extends Model
{
    //
    public function reader()
    {
        return $this->belongsTo(reader::class);
    }
}
