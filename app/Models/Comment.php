<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    // aikhane amra normal user lekhe krtam partam tokhon r class ar por extra jinis lekhar dorkar porto nhh
    public function commnetedBy()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
