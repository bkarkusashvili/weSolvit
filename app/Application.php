<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use Notifiable;
    
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

    public static function total()
    {
        return Application::all()->count();
    }

    public static function progress()
    {
        return Application::whereIn('status', [2, 3])->get()->count();
    }
    
    public static function solved()
    {
        return Application::where('status', 4)->get()->count();
    }

    public function isClosed()
    {
        return $this->status == 4;
    }

    public function shouldClose()
    {
        return request()->get('status', 0) == 4;
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname; 
    }

    public function getStatusHtmlAttribute()
    {
        $status = self::getStatus()[$this->status];

        return '<span class="status '. $status[1] .'">'. $status[0] .'</span>';
    }

    public function getPriorityHtmlAttribute()
    {
        $status = self::getPriority()[$this->priority];

        return '<span class="priority '. $status[1] .'">'. $status[0] .'</span>';
    }

    public static function getStatus()
    {
        return [
            1 => ['Open', 'info'],
            2 => ['In Progress', 'progress'],
            3 => ['Solved', 'success'],
            4 => ['Closed', 'danger'],
        ];
    }

    public static function getPriority()
    {
        return [
            1 => ['Low', 'info'],
            2 => ['Medium', 'success'],
            3 => ['High', 'danger'],
        ];
    }
}
