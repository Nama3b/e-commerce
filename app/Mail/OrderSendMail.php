<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    protected Order $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct
    (
        Order $order,
    )
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('eproject.co.ltd@gmail.com', 'E-Project'),
            subject: 'Order send mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'order-send-mail',
            with: [
                'name' => $this->order->name,
                'email' => $this->order->email,
                'address' => $this->order->address,
                'phone_number' => $this->order->phone_number,
                'notice' => $this->order->notice,
                'total' => $this->order->total,
                'created_date' => $this->order->created_at,
                'order_detail' => $this->order->orderdetails,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
