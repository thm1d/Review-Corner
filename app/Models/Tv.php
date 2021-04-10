<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Tv extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [ 'tv_id', 'title'];


    public function scopeGetMovie($query, $tv_id )
    {
        return $query->where('tv_id',  $tv_id )->first();
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
