<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
</head>
<body>
    <h1>Client Details</h1>

    <div>
        <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
        <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
        <p><strong>Price:</strong> {{ $client->price }}</p>
        <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
        <p><strong>Stage:</strong> {{ $client->stage }}</p>
        <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
    </div>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Update Client</h2>
    <form method="POST" action="/clients/{{ $client->id }}/update">
        @csrf

        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $client->price) }}">
        </div>

        <div>
            <label for="timeline">Timeline</label>
            <input type="text" id="timeline" name="timeline" value="{{ old('timeline', $client->timeline) }}">
        </div>

        <button type="submit">Update</button>
    </form>

    @php
        $lead = \App\Models\Lead::find($client->lead_id);
    @endphp

    @if ($lead && $lead->phone)
        @php
            $message = "Client Code: {$client->client_code}\nService: {$client->service_type}\nPrice: {$client->price}\nTimeline: {$client->timeline}";
            $whatsappUrl = "https://wa.me/91{$lead->phone}?text=" . urlencode($message);
        @endphp
        <p><a href="{{ $whatsappUrl }}" target="_blank">Send to WhatsApp</a></p>
    @endif

    <p><a href="/clients">Back to Clients</a></p>
</body>
</html>
