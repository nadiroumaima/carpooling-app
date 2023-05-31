<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $table = 'ratings';

    protected $primaryKey = 'id';

    protected $fillable = ['driver_id', 'passenger_id','reservation_id', 'comment','rating'];

}
