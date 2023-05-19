<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'num_passengers',
        'notes',
        'is_dropped',
    ];
    
    protected $casts = [
        'is_dropped' => 'boolean',
    ];
    
    public function ride()
    {
        return $this->belongsTo(Ride::class);
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
