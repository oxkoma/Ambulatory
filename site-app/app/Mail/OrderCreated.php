<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Ambulatory;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $order;
    // protected $doctors;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->order = $request;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $doctor = Doctor::where('id', $this->order->doctor_id)->first();
        $ambulatories = Ambulatory::all();
        $subject = 'Ваш запис отримано';
        return $this->subject($subject)->markdown('mails.order-created', 
            ['order' => $this->order, 'ambulatories' => $ambulatories, 'doctor' => $doctor]);
    }
}