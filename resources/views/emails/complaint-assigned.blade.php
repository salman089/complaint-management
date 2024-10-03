<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Assigned</title>
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
        }

        p {
            color: #555555;
            line-height: 1.6;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #eeeeee;
        }

        ul li strong {
            color: #333333;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Complaint Assigned Successfully</h1>
        <p>Dear {{ $complaint->user->name }},</p>
        <p>Your complaint has been assigned to our team. Here are the details:</p>
        <ul>
            <li><strong>Complaint:</strong> {{ $complaint->complaint }}</li>
            <li><strong>Assigned Employees:</strong>
                <ul>
                    @foreach ($complaint->assignees as $assignee)
                        <li><strong>User ID:</strong> {{ $assignee->user_id }} <strong>Name:</strong> {{ $assignee->user->name }}</li>
                    @endforeach
                </ul>
            </li>
            <li><strong>Additional Notes:</strong> {{ $additional_notes ?? 'None' }}</li>
        </ul>
        <p>Thank you for your patience. Our team will start addressing your complaint shortly.</p>
    </div>
</body>

</html>
