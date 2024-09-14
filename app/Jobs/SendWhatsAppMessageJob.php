<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWhatsAppMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Kirim pesan WhatsApp menggunakan API WhatsApp atau link wa.me
        $whatsappNumber = '62895360889600'; // Nomor WhatsApp tujuan
        $whatsappMessage = 'Name: ' . $this->name . '%0A'
            . 'Email: ' . $this->email . '%0A'
            . 'Subject: ' . $this->subject . '%0A'
            . 'Message: ' . $this->message;

        $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode($whatsappMessage);

        // Jika menggunakan API, contoh dengan HTTP request
        // Http::get($whatsappUrl);

        // Akses URL untuk mengirim pesan secara otomatis
        Http::get($whatsappUrl);
    }
}
