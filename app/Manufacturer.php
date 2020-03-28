<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['title', 'body'];

    public function smartdevices()
    {
        return $this->hasMany('App\Smartdevice');
    }
}
