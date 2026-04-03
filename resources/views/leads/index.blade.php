<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads</title>
</head>
<body>
    <h1>Leads</h1>

    <p><a href="/leads/create">Create New Lead</a></p>

    @if ($leads->isEmpty())
        <p>No leads found.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Business</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Assigned To</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->business_name }}</td>
                        <td>{{ $lead->contact_name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->service_type }}</td>
                        <td>{{ $lead->status }}</td>
                        <td>{{ $lead->assigned_to }}</td>
                        <td>{{ $lead->created_by }}</td>
                        <td>
                            <a href="/leads/{{ $lead->id }}/edit">Edit</a>
                            <form method="POST" action="/leads/{{ $lead->id }}/convert" style="display:inline;">
                                @csrf
                                <button type="submit">Convert</button>
                            </form>
                            <form method="POST" action="/leads/{{ $lead->id }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
