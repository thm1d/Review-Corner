<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use willvincent\Rateable\Rateable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'current_address',
        'permanent_address',
        'birthday',
        'mobile',
        'watchlist_movie',
        'watchlist_tv',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'watchlist_movie' => 'array',
        'watchlist_tv' => 'array',
    ];

    // public function ratings() {
  
    //     return $this->hasMany(Rating::class);
     
    // }

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }

    public function tv()
    {
        return $this->hasMany(Tv::class);
    }

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
