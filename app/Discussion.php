<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}
