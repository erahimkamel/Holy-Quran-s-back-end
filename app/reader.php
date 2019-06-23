<?php

namespace App;
use App\record;
use Illuminate\Database\Eloquent\Model;

class reader extends Model
{
    //
    protected $fillable = [
        'userName', 'password','confirmPassword','email', 'api_token',
    ];
    //
    public function bookmark()
    {
        return $this->hasMany(bookmark::class);
    }
    public function record()
    {
        return $this->hasMany(record::class);
    }
}
