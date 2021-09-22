@component('mail::message')
# Dear {{ $order->first_name }},

Your order id {{ $order->order_id }} has been shipped. You will receive this order within next 5 working days.

@component('mail::button', ['url' => route('front.home')])
Visite our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
