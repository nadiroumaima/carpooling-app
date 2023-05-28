<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'user_id',
        'num_passengers',
        'notes',
        'is_dropped',

    ];
    
    protected $casts = [
        'is_dropped' => 'boolean',
    ];
    
    public function ride()
    {
        return $this->belongsTo(rides::class, 'ride_id');
    }
    
    public function getReservationsByRide($rideId)
    {
        try {
            $reservations = self::where('ride_id', $rideId)->get();
                return $reservations;
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            echo "Error fetching reservations: " . $e->getMessage();
        }
    }
    
    public function scopeDropped($query)
    {
        return $query->where('is_dropped', true);
    }
    
    public function scopeUndropped($query)
    {
        return $query->where('is_dropped', false);
    }
}
