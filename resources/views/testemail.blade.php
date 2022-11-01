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

    <p>Book Name:  {{ $mailData['book_name'] }}</p>
    <p>Url : {{  $mailData['url'] }}</p>
    <p>Book author Name: {{  $mailData['book_autor'] }}</p>
    <p>Book Category: {{  $mailData['book_category'] }}</p>
    <p>Book from avaiable: {{  $mailData['from_avaiable'] }}</p>
  
</body>
</html>

