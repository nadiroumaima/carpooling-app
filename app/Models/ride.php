<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ride extends Model
{
    use HasFactory;
    protected $fillable= ['departure_time', 'arrvale', 'date','price','seats_available','user_id'];
    public function user() {return $this->belongTo(User::class);}
    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
    
}
