<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function getDevices($perPage)
    {
        return $this->paginate($perPage);
    }
}
