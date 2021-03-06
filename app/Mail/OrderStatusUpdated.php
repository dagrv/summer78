<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Order $order) {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Your order changed')
            ->markdown('email.orders.updated');
    }
}
