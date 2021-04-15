<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Game extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [ 'game_slug', 'title'];

    public function scopeGetGame($query, $game_slug )
    {
        return $query->where('game_slug',  $game_slug )->first();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

    }

    public function ratings()
    {
        return $this->morphMany('App\Models\Rating', 'rateable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
