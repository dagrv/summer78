@component('mail::message')
# Your order n°{{ $order->id }} has been placed.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
