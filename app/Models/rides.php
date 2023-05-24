<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rides extends Model
{
    use HasFactory;
    protected $table = 'rides';

    protected $fillable = [
        'source',
        'destination',
        'date',
        'seats_available',
        'price_per_seat',
        'user_id',
    ];

    public static function createRide($data)
    {
        $ride = new static;
        $ride->fill($data);
        $ride->save();

        return $ride;
    }

    public function storeRide($data)
    {
        $this->fill($data);
        $this->save();

        return $this;
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

}
