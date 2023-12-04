<!DOCTYPE html>
<html>

<head>
    <title>New Report</title>
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .header {
            padding: 10px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20p x rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 30px;
            padding: 15px;
            border-top: 2px solid #ddd;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
    </div>
    <div class="container">
        <h2>Inventory Report</h2>
        <p>{{ $data['select'] }}</p>
        <p><strong>Description:</strong> {{ $data['description'] }}</p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} flarego.ph. All rights reserved.</p>
    </div>
</body>

</html>
