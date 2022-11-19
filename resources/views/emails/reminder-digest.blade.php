@component('mail::message')
# You have some reminders to follow up. Below are their details:

@component('mail::table')
|Reminder|Lead name|Phone|
|:-------|:--------|:----|
@foreach($userId as $reminder)
{{-- {{dd($reminder)}} --}}
|{{$reminder['book_id']}}|{{$reminder['user_id']}}|{{$reminder['cart_id']}}
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
