@component('mail::message')
# Congratulation your shop is activated



@component('mail::button', ['url' => route('shops.show',$shop->id)])
visit shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
