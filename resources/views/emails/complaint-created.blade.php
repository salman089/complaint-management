<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Submitted</title>
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
        <h1>Complaint Submitted Successfully</h1>
        <p>Dear {{ $complaint->user->name }},</p>
        <p>Your complaint has been submitted successfully. Here are the details:</p>
        <ul>
            <li><strong>Complaint:</strong> {{ $complaint->complaint }}</li>
            <li><strong>Phone:</strong> {{ $complaint->phone }}</li>
            <li><strong>Address:</strong> {{ $complaint->street_address }}, {{ $complaint->city }},
                {{ $complaint->region }} {{ $complaint->postal_code }}</li>
            <li><strong>Images:</strong>
                @forelse ($complaint->photos as $photo)
                    <p>
                        <a href="{{ asset('storage/' . $photo->file_path) }}" target="_blank">
                            View Image {{ $loop->iteration }}
                        </a>
                    </p>
                @empty
                    <p>No images uploaded</p>
                @endforelse
            </li>
        </ul>
        <p>Thank you for reaching out to us. We will address your issue as soon as possible.</p>
    </div>
</body>

</html>
