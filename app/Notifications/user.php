<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class user extends Notification
{
    use Queueable;

    private $message, $user_id, $destination_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($message, $user_id, $destination_id)
    {
        $this->message = $message;
        $this->user_id = $user_id;
        $this->destination_id = $destination_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'user_id' => $this->user_id,
            'destination_id' => $this->destination_id
        ];
    }
}
