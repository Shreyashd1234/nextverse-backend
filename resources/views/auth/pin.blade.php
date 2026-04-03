<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify PIN</title>
</head>
<body>
    <h1>Verify PIN</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/verify-pin">
        @csrf

        <div>
            <label for="pin">4-Digit PIN</label>
            <input type="password" id="pin" name="pin" maxlength="4" required>
        </div>

        <button type="submit">Verify</button>
    </form>
</body>
</html>
