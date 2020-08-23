@component('mail::message')
# Shop Activation request

please activate shop.here are shop details.
Shop Name : {{ $shop->name }}
Shop Owner : {{ $shop->owner->name }}

@component('mail::button', ['url' => '/admin/shops'])
Manage Shops
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent