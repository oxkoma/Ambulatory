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
        // $this->doctors = Doctor::all();
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
        $subject = 'Ваш запис отримано';
        return $this->subject($subject)->view('mails.order-created', ['order' => $this->order, 'doctors' => $doctors, 'ambulatories' => $ambulatories]);
    }
}