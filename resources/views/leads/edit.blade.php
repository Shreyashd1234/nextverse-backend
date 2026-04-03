<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lead</title>
</head>
<body>
    <h1>Edit Lead</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/leads/{{ $lead->id }}">
        @csrf
        @method('PUT')

        <div>
            <label for="business_name">Business Name</label>
            <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $lead->business_name) }}" required>
        </div>

        <div>
            <label for="contact_name">Contact Name</label>
            <input type="text" id="contact_name" name="contact_name" value="{{ old('contact_name', $lead->contact_name) }}" required>
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $lead->phone) }}" required>
        </div>

        <div>
            <label for="service_type">Service Type</label>
            <input type="text" id="service_type" name="service_type" value="{{ old('service_type', $lead->service_type) }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="{{ old('status', $lead->status) }}" required>
        </div>

        <div>
            <label for="assigned_to">Assigned To</label>
            <select id="assigned_to" name="assigned_to">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @selected(old('assigned_to', $lead->assigned_to) == $user->id)>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update Lead</button>
    </form>

    <p><a href="/leads">Back to Leads</a></p>
</body>
</html>
