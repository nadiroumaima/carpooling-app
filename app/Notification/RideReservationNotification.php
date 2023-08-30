<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class RideReservationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;
    protected $userId;

     public function __construct($reservation, $userId)
        {
            $this->reservation = $reservation;
            $this->userId = $userId;
        }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $user = $this->reservation->createdBy;
        // Generate the URL for the map view
        $mapUrl = route('rides.map', ['id' => $this->reservation->ride->id]);

        return (new MailMessage)
            ->subject('New Ride Reservation')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('You have received a new ride reservation.')
            ->line('Reservation Details:')
            ->line('User: ' . $user->name)
            ->line('Email: ' . $user->email)
            ->line('Ride ID: ' . $this->reservation->ride->id)
            ->line('Departure Time: ' . $this->reservation->ride->departure_time)
            ->line('Pickup Location: ' . $this->reservation->ride->source)
            ->line('You can view the map for this ride by clicking the link below:')
            ->action('View Map', $mapUrl)
            ->line('Thank you for using our carpooling app!');
    }



    public function toDatabase($notifiable)
{
    $user = User::find($this->userId);
    return [
        'reservation_id' => $this->reservation->id,
        'message' => 'You have received a new ride reservation',
        'user_name' => $user->name,
        'user_email' => $user->email,
        'ride_id' => $this->reservation->ride->id,
        'departure_time' => $this->reservation->ride->departure_time,
        'pickup_location' => $this->reservation->ride->pickup_location,
    ];
}

}