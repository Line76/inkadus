<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  User $user
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user) {
        return (new MailMessage)->subject('Confirmation d\'email')->line("Bienvenue $user->full_name,")
                                ->line("L'équipe d'inKadus est heureuse de vous accueillir sur le site. Il ne vous reste plus qu'à confirmer votre compte en cliquant sur le bouton ci-dessous:")
                                ->action('Confirmer mon compte', route('register.confirm', [
                                    'email' => $user->email,
                                    'token' => $user->confirmed_token
                                ]))->line('Merci pour votre confiance.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [];
    }
}
