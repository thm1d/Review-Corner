<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Rating extends Model
{
    use HasFactory, Rateable;

    public $fillable = ['rating'];

    public function rateable() {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // *
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
     
    // protected $fillable = [
    //     'rateable_id', 'rateable_type', 'rating', 'user_id',
    // ];
}
