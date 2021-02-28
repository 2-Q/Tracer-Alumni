<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'role',
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

    public function Siswa()
    {
        return $this->hasOne(new Siswa);
    }
    public function Profession()
    {
        return $this->hasOne(new Profession);
    }

    public function ProfessionTrash()
    {
         return $this->hasMany(new Profession)->withTrashed();
    }

    public function Achievement()
    {
        return $this->hasMany(new Achievement);
    }

    public function Pengalaman()
    {
        return $this->hasMany(new Pengalaman);
    }
}
