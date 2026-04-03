<html>
<head>
<style>
body {
    font-family: DejaVu Sans, sans-serif;
    padding: 60px;
    color: #111;
}

.top-line {
width: 100%;
height: 4px;
background: linear-gradient(to right, #7c3aed, #6366f1);
margin-bottom: 20px;
}

.header {
width: 100%;
margin-bottom: 25px;
}

.header table {
width: 100%;
}

.logo {
height: 45px;
}

.client-name {
text-align: right;
font-size: 16px;
font-weight: bold;
}

.title {
font-size: 26px;
font-weight: bold;
margin-top: 10px;
margin-bottom: 25px;
}

.section {
margin-top: 25px;
}

.section-title {
font-weight: bold;
font-size: 14px;
margin-bottom: 6px;
}

.content {
font-size: 14px;
line-height: 1.8;
color: #222;
}
</style>

</head>

<body>

<div class="top-line"></div>

<div class="header">
    <table>
        <tr>
            <td>
                <img src="{{ public_path('logo.png') }}" class="logo">
            </td>
            <td class="client-name">
                {{ $client_name }}
            </td>
        </tr>
    </table>
</div>

<div class="title">Minutes of Meeting</div>

<div class="section">
<div class="section-title">Meeting Title</div>
<div class="content">{{ $title }}</div>
</div>

<div class="section">
<div class="section-title">Date & Time</div>
<div class="content">{{ $date }} | {{ $time }}</div>
</div>

<div class="section">
<div class="section-title">Agenda</div>
<div class="content">{{ $agenda }}</div>
</div>

<div class="section">
<div class="section-title">Discussion Summary</div>
<div class="content">{{ $discussion }}</div>
</div>

<div class="section">
<div class="section-title">Decisions Made</div>
<div class="content">{{ $decisions }}</div>
</div>

<div class="section">
<div class="section-title">Action Items</div>
<div class="content">{{ $actions }}</div>
</div>

</body>
</html>
