<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    public function getUserRoles()
    {
        return ['admin', 'company', 'freelance'];
    }

    public function getStatus()
    {
        return [
            0 => 'Pending',
            1 => 'Active',
        ];
    }

}
