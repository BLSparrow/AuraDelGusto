<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $numberTable;
    protected $dateStart;
    protected $dateEnd;

    public function __construct($name, $numberTable, $dateStart, $dateEnd)
    {
        $this->name = $name;
        $this->numberTable = $numberTable;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public function build()
    {
        return $this->view('emails.shipped', [
            'name' => $this->name,
            'numberTable' => $this->numberTable,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
        ]);
    }
}
