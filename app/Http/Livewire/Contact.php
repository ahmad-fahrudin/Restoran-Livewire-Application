<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Jobs\SendWhatsAppMessageJob;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        // Masukkan job ke dalam queue
        SendWhatsAppMessageJob::dispatch($this->name, $this->email, $this->subject, $this->message);

        session()->flash('message', 'Pesan Anda sedang diproses dan akan segera dikirim ke WhatsApp.');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.contact');
    }
}
