<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>
<body>
    <h1>Test EMAIL</h1>

    {{-- {{ $mailData['book_name'] }} --}}
    {{-- <p>Name: {{  $mailData['url'] }}</p>
    <p>Name: {{  $mailData['book_autor'] }}</p>
    <p>Name: {{  $mailData['book_category'] }}</p>
    <p>Name: {{  $mailData['from_avaiable'] }}</p> --}}
    {{-- <p>Name: {{ $message->book_name }}</p>
    <p>DOB: {{ $input['book_author'] }}</p> --}}
</body>
</html>

@component('mail::message')
{{ $mailData['title'] }}
The body of your message.
@component('mail::button', ['url' => $mailData['url']])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent