<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RideReservationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $user = $this->reservation->createdBy;

        return (new MailMessage)
            ->subject('New Ride Reservation')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('You have received a new ride reservation.')
            ->line('Reservation Details:')
            ->line('User: ' . $user->name)
            ->line('Email: ' . $user->email)
            // Add more user details as needed
            ->line('Ride ID: ' . $this->reservation->ride->id)
            ->line('Departure Time: ' . $this->reservation->ride->departure_time)
            ->line('Pickup Location: ' . $this->reservation->ride->source)
            ->action('View Reservation', url('/reservations/' . $this->reservation->id))
            ->line('Thank you for using our carpooling app!');
    }


    public function toDatabase($notifiable)
{
    $user = $this->reservation->createdBy;

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
