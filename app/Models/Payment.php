<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = ['name', 'value', 'method', 'tranx_id', 'sender_number', 'contact_number', 'bank_name', 'bank_account_no', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
