<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    private $itemsPerPage = 10;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function stream()
    {
        return $this->belongsTo('App\StreamType');
    }

    public function getChannels()
    {
        $channels = $this->paginate($this->itemsPerPage);
        return $channels;
    }
}
