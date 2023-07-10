<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Doctor;
use App\Models\Ambulatory;
use App\Models\Speciality;

class RejectOrder extends Mailable
{
    use Queueable, SerializesModels;
    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $doctors = Doctor::all();
        $ambulatories = Ambulatory::all();
        $specialities = Speciality::all();
        $subject = 'Запис відхилено';
        return $this->subject($subject)->markdown('mails.reject-order', ['order' => $this->order, 
        'doctors' => $doctors, 'ambulatories' => $ambulatories, 'specialities' => $specialities]);
    }
}