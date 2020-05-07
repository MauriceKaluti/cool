@component('mail::message')
# Order Shipped

Your order has been shipped 

Your total price is {{$order->total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
Cool Concepts Ke.
@endcomponent
