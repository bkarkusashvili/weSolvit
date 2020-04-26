<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function solved()
    {
        return $this->hasMany(Solved::class);
    }
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getLogoAttribute()
    {
        $image = $this->role == 'company' ? Storage::url($this->image) : '';

        return $image;
    }

    public function GetDisplayNameAttribute()
    {

        $name = '';
        if ($this->role === 'company') {
            $name = $this->company_name;
        } elseif ($this->role === 'freelance') {
            $name = $this->firstname .' '. $this->lastname;
        } else {
            $name = 'ცარიელი';
        }

        return $name;
    }

    public function GetStatusHtmlAttribute()
    {
        $status = self::getStatus()[$this->status];

        return "<span class='status $status[1]'>$status[0]</span>";
    }

    public static function getUserRoles(bool $onlyPublic = true)
    {
        $roles = ['admin', 'company', 'freelance'];
        if ($onlyPublic) {
            array_shift($roles);
        }

        return $roles;
    }

    public static function getStatus()
    {
        return [
            1 => ['Pending', 'info'],
            2 => ['Active', 'success'],
        ];
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function isActive()
    {
        return (bool) $this->status;
    }
    
    public function ownApplication(Application $application)
    {
        return $this->id == $application->user_id;
    }

}
