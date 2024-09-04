<!DOCTYPE html>
<html>
<head>
    <title>Complaint Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #555555;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        strong {
            color: #333333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Complaint Status </h1>
        <p><strong>Complaint ID:</strong> {{ $complaint->id }}</p>
        <p><strong>Customer Name:</strong> {{ $complaint->user->name }}</p>
        <p><strong>Status:</strong> {{ $complaint->status }}</p>
        <p><strong>Complaint Details:</strong> {{ $complaint->complaint }}</p>
        <p><strong>Phone:</strong> {{ $complaint->phone }}</p>
        <p><strong>Address:</strong> {{ $complaint->street_address }}, {{ $complaint->city }}, {{ $complaint->region }}, {{ $complaint->postal_code }}</p>
    </div>
</body>
</html>
