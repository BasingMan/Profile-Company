<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1 style="color: #333; font-family: Arial, sans-serif;">Introduction</h1>
    <p style="font-size: 16px; color: #666; font-family: Arial, sans-serif;">
        <strong>From:</strong> {{ $user->name }}
    </p>
    
    <p style="font-size: 16px; color: #666; font-family: Arial, sans-serif;">
        <strong>Subject:</strong> {{ $user->subject }}
    </p>
    
    <p style="font-size: 16px; color: #666; font-family: Arial, sans-serif;">
        <strong>Message:</strong> {{ $user->message }}
    </p>
    
    <p style="font-size: 16px; color: #666; font-family: Arial, sans-serif;">
        Thanks,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>

