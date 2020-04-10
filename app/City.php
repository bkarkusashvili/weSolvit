<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
