<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [ 'movie_id', 'title'];


    public function scopeGetMovie($query, $movie_id )
    {
        return $query->where('movie_id',  $movie_id )->first();
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
