<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FicheRecevoir extends Notification
{
    protected $fiche;
    protected $recevoir;
    protected $user_id;
    protected $patient_id;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fiche, $recevoir, $user_id, $patient_id)
    {
        $this->fiche = $fiche;
        $this->recevoir = $recevoir;
        $this->user_id = $user_id;
        $this->patient_id= $patient_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via()
    {
        return [database];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'fiche' => $this->ficheanalyse->date,
            'ficheanalyse_id' => (integer)$this->ficheanalyse->id,
            'recevoir' => (integer)$this->recevoir,
            'user' => (integer)$this->user_id,
            'patient'=> (integer)$this->patient_id
        ];
    }
}