<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f2f5;
        }

        .layout {
            height: 100vh;
            display: flex;
        }

        .users {
            width: 280px;
            border-right: 1px solid #ddd;
            padding: 12px;
            box-sizing: border-box;
            overflow-y: auto;
        }

        .chat-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .messages {
            flex: 1;
            overflow-y: auto;
            padding: 12px;
        }

        .row {
            display: flex;
            margin-bottom: 8px;
        }

        .row.right {
            justify-content: flex-end;
        }

        .row.left {
            justify-content: flex-start;
        }

        .bubble {
            max-width: 70%;
            padding: 8px 10px;
            border-radius: 10px;
        }

        .mine {
            background: #25d366;
            color: #fff;
        }

        .other {
            background: #f1f1f1;
        }

        .timestamp {
            font-size: 11px;
            margin-top: 4px;
            opacity: 0.8;
        }

        .input-box {
            border-top: 1px solid #ddd;
            padding: 10px;
        }

        .input-box form {
            display: flex;
            gap: 6px;
        }

        .input-box input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .input-box button {
            padding: 8px 12px;
            border: none;
            background: #25d366;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="layout">
        <div class="users">
            <h3 style="margin-top: 0;">Users</h3>
            @if ($users->isEmpty())
                <p>No users found.</p>
            @else
                <ul>
                    @foreach ($users as $user)
                        <li>
                            <a href="/chat/{{ $user->id }}">{{ $user->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="chat-panel">
            <div class="messages">
                @if (! $selectedUser)
                    <p>Select a user to start chat.</p>
                @elseif ($messages->isEmpty())
                    <p>No messages yet.</p>
                @else
                    @foreach ($messages as $message)
                        @php
                            $isMine = $message->sender_id === auth()->id();
                        @endphp
                        <div class="row {{ $isMine ? 'right' : 'left' }}">
                            <div class="bubble {{ $isMine ? 'mine' : 'other' }}">
                                <div>{{ $message->message }}</div>
                                <div class="timestamp">{{ $message->created_at->format('Y-m-d H:i') }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if ($selectedUser)
                <div class="input-box">
                    <form method="POST" action="/chat/send">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $selectedUser->id }}">
                        <input type="text" id="message" name="message" value="{{ old('message') }}" placeholder="Type message" required>
                        <button type="submit">Send</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
