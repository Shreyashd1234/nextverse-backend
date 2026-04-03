<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetings</title>
</head>
<body>
    <h1>Meetings & Follow-ups</h1>

    <p><a href="/meetings/create">Schedule New Meeting</a></p>

    @if ($meetings->isEmpty())
        <p>No meetings scheduled.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Lead ID</th>
                    <th>User ID</th>
                    <th>Scheduled At</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->title }}</td>
                        <td>{{ $meeting->lead_id }}</td>
                        <td>{{ $meeting->user_id }}</td>
                        <td>{{ $meeting->scheduled_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $meeting->status }}</td>
                        <td>{{ $meeting->remarks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
