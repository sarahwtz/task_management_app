<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    public $name;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       $url = 'http://localhost:8000/password/reset/'.$this->token. '?email='.$this->email;
       $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
       $greeting = 'Hi, '.$this->name. '!';

       return (new MailMessage)
            ->subject('Reset Password Notification')
            ->greeting($greeting)
            ->line('Forgot your password? No problem, we will help you.')
            ->action('Click here to change your password', $url) // botao que o usuario clica
            ->line('This password reset link will expire in '.$minutos.' minutes')
            ->line('If you did not request a password reset, no further action is required.')
            ->salutation('See you later!');
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
            //
        ];
    }
}
