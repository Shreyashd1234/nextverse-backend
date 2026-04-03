<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Panel</title>
</head>
<body>
    <h1>Welcome Client</h1>

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role }}</p>

    <p><a href="/logout">Logout</a></p>
</body>
</html>
