<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['hotel_id', 'user_id', 'progress'];

    public function getHotels()
    {
        return $this->belongsTo(Hotel::class,'hotel_id', 'id');
    }

    public function getUsers()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
