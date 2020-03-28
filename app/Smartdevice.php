<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartdevice extends Model
{
    protected $fillable = ['serial', 'description', 'manufacturer_id', 'manufacturer'];

    public function manufacturer()
    {
          return $this->belongsTo('App\Manufacturer');
    }
}
