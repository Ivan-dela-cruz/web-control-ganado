<?php

namespace App\Mail;

use App\Animal;
use App\Checkup;
use App\Estate;
use App\Veterinary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterCheckup extends Mailable
{
    use Queueable, SerializesModels;

    public $checkup;
    public $estate;
    public $animal;
    public $vet;

    public $subject = 'NUEVO CHECKEO';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Checkup $checkup, Estate $estate, Animal $animal, Veterinary $vet)
    {
        $this->checkup = $checkup;
        $this->estate = $estate;
        $this->animal = $animal;
        $this->vet = $vet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.registerCheckup');
    }
}
