<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'item_id', 'item_type', 'review'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
