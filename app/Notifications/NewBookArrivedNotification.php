<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookArrivedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $newBookData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newBookData)
    {
        $this->newBookData = $newBookData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       
        return (new MailMessage)
            // ->line($this->newBookData['title'])
            // ->line("Book Name: " . $this->newBookData['book_name'])
            // ->action("to see new book hear ", $this->newBookData['url'])
            // ->line("Book author Name: " . $this->newBookData['book_autor'])
            // ->line("Book Category: " . $this->newBookData['book_category'])
            // ->line("Book from avaiable: " . $this->newBookData['from_avaiable']);
           
                    ->line($this->newBookData['name'])
                    ->greeting($this->newBookData['greeting'])
                    ->line($this->newBookData['body'])
                    ->action($this->newBookData['actionText'], $this->newBookData['actionUrl'])
                    ->line($this->newBookData['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            // 'offer_id' => $this->newBookData['offer_id']
        ];
    }
}