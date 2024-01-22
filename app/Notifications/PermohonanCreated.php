<?php

namespace App\Notifications;

use App\Models\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermohonanCreated extends Notification
{
    use Queueable;

    private Permohonan $permohonan;

    /**
     * Create a new notification instance.
     */
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Yang terhormat,' . ' ' . $this->permohonan->user->name)
            ->subject('Permohonan' . ' ' . '#' . $this->permohonan->id . ' ' . 'Berhasil di Ajukan!')
            ->line('Permohonan anda telah berhasil kami terima. Selanjutnya, tindaklanjut permohonan ini membutuhkan waktu 4 - 7 hari bursa kerja. Setelah berkas selesai diproses, anda akan menerima email notifikasi dari kami apabila berkas telah selesai diproses.')
            ->line('Sekarang anda dapat memantau proses berkas anda pada menu "Tracking" di Aplikasi Sijarimu:')
            ->action('Login Aplikasi Sijarimu', url('https://sijarimu.kepri.pro'))
            ->line('Terimakasih telah menggunakan aplikasi Sijarimu!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
