<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Meeting</title>
</head>
<body>
    <h1>Schedule Meeting</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/meetings">
        @csrf

        <div>
            <label for="lead_id">Lead</label>
            <select id="lead_id" name="lead_id" required>
                <option value="">Select Lead</option>
                @foreach($leads as $lead)
                    <option value="{{ $lead->id }}" @selected(old('lead_id') == $lead->id)>{{ $lead->business_name }} - {{ $lead->contact_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title">Meeting Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="scheduled_at">Date & Time</label>
            <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}" required>
        </div>

        <div>
            <label for="remarks">Remarks</label>
            <textarea id="remarks" name="remarks">{{ old('remarks') }}</textarea>
        </div>

        <button type="submit">Schedule Meeting</button>
    </form>

    <p><a href="/meetings">Back to Meetings</a></p>
</body>
</html>
