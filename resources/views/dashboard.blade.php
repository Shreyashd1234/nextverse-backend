<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }} ({{ $user->role }})</h1>

    <h2>Smart Reminders</h2>

    <div>
        <h3>Upcoming in 30 mins</h3>
        @if ($meetings_30m->isEmpty())
            <p>No meetings in the next 30 minutes.</p>
        @else
            <ul>
                @foreach ($meetings_30m as $meeting)
                    <li>{{ $meeting->title }} - {{ $meeting->scheduled_at->format('Y-m-d H:i') }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <h3>Upcoming in 1 hour</h3>
        @if ($meetings_1h->isEmpty())
            <p>No meetings in the next 1 hour.</p>
        @else
            <ul>
                @foreach ($meetings_1h as $meeting)
                    <li>{{ $meeting->title }} - {{ $meeting->scheduled_at->format('Y-m-d H:i') }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <h3>Upcoming in 6 hours</h3>
        @if ($meetings_6h->isEmpty())
            <p>No meetings in the next 6 hours.</p>
        @else
            <ul>
                @foreach ($meetings_6h as $meeting)
                    <li>{{ $meeting->title }} - {{ $meeting->scheduled_at->format('Y-m-d H:i') }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <h3>Missed Meetings</h3>
        @if ($missed_meetings->isEmpty())
            <p>No missed meetings.</p>
        @else
            <ul>
                @foreach ($missed_meetings as $meeting)
                    <li>{{ $meeting->title }} - {{ $meeting->scheduled_at->format('Y-m-d H:i') }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
