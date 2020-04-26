<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['displayName']);
    }

    public function getTextAttribute()
    {
        return $this->text_ge;
    }

    public function getCommentAttribute()
    {
        return $this->comment_ge;
    }
}
