@component('mail::message')
# Your order n°{{ $order->id }} status changed

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks, Summer78<br>
{{ config('app.name') }}
@endcomponent
