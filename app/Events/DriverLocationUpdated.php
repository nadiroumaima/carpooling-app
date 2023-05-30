<?php

namespace App\Events;

use App\Models\Locations;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DriverLocationUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $location;

    /**
     * Create a new event instance.
     *
     * @param  int  $driverId
     * @param  float  $latitude
     * @param  float  $longitude
     * @return void
     */
    public function __construct(int $driverId, float $latitude, float $longitude)
    {
        $this->location = new Locations();
        $this->location->driver_id = $driverId;
        $this->location->latitude = $latitude;
        $this->location->longitude = $longitude;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('driver-location.'.$this->location->driver_id);
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'latitude' => $this->location->latitude,
            'longitude' => $this->location->longitude,
        ];
    }
}
