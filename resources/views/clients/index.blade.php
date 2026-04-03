<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
</head>
<body>
    <h1>Clients</h1>

    @if ($clients->isEmpty())
        <p>No clients found.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Service Type</th>
                    <th>Price</th>
                    <th>Timeline</th>
                    <th>Stage</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->client_code }}</td>
                        <td>{{ $client->service_type }}</td>
                        <td>{{ $client->price }}</td>
                        <td>{{ $client->timeline }}</td>
                        <td>{{ $client->stage }}</td>
                        <td>{{ $client->assigned_growth_id }}</td>
                        <td>
                            <a href="/clients/{{ $client->id }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p><a href="/leads">Back to Leads</a></p>
</body>
</html>
