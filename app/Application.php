<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'ცარიელი'
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['displayName']);
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname; 
    }

    public function getStatusHtmlAttribute()
    {
        $status = $this->getStatus()[$this->status];

        return '<span class="status '. $status[1] .'">'. $status[0] .'</span>';
    }

    public function getPriorityHtmlAttribute()
    {
        $status = $this->getPriority()[$this->priority];

        return '<span class="priority '. $status[1] .'">'. $status[0] .'</span>';
    }

    public function getStatus()
    {
        return [
            0 => ['Open', 'info'],
            1 => ['In Progress', 'progress'],
            2 => ['Solved', 'success'],
            3 => ['Closed', 'danger'],
        ];
    }

    public function getPriority()
    {
        return [
            0 => ['Low', 'info'],
            1 => ['Medium', 'success'],
            2 => ['High', 'danger'],
        ];
    }
}
