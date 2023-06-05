<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rides extends Model
{
    use HasFactory;
    protected $table = 'rides';
    protected $sourceLatitudeColumn = 'source_latitude';
    protected $sourceLongitudeColumn = 'source_longitude';
    protected $destinationLatitudeColumn = 'destination_latitude';
    protected $destinationLongitudeColumn = 'destination_longitude';

    protected $fillable = [
        'source',
        'destination',
        'date',
        'seats_available',
        'departure_time',
        'price_per_seat',
        'user_id',
        'source_latitude',
        'source_longitude',
        'destination_latitude',
        'destination_longitude',
    ];


    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }


    public function user() {return $this->belongTo(User::class);}

	/**
	 * @return mixed
	 */
	public function getTable() {
		return $this->table;
	}

	/**
	 * @param mixed $table
	 * @return self
	 */
	public function setTable($table): self {
		$this->table = $table;
		return $this;
	}
    public function getSourceLatitudeAttribute()
    {
        return $this->{$this->sourceLatitudeColumn};
    }

    public function getSourceLongitudeAttribute()
    {
        return $this->{$this->sourceLongitudeColumn};
    }

    public function getDestinationLatitudeAttribute()
    {
        return $this->{$this->destinationLatitudeColumn};
    }

    public function getDestinationLongitudeAttribute()
    {
        return $this->{$this->destinationLongitudeColumn};
    }

}
