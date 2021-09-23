@component('mail::message')
# Dear {{ $order->first_name }},

Your order id {{ $order->order_id }} has been canceled. Please contact with support for any quary.

@component('mail::button', ['url' => route('front.home')])
Visite our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
