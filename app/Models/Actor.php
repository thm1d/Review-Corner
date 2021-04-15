<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Actor extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [ 'actor_id', 'name'];


    public function scopeGetMovie($query, $actor_id )
    {
        return $query->where('actor_id',  $actor_id )->first();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['name'] = $value;

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
