<!DOCTYPE html>
<html>

<head>
    <title>Complaint Completed</title>
</head>
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

<body>
    <div class="email-container">
    <h1>Complaint #{{ $complaint->id }} Completed</h1>

    <p>Hello {{ $complaint->user->name }},</p>

    <p>Your complaint has been marked as completed. Below are the details:</p>

    <ul>
        <li><strong>Complaint ID:</strong> {{ $complaint->id }}</li>
        <li><strong>Status:</strong> {{ $complaint->status }}</li>
        <li><strong>Completion Note:</strong> {{ $complaint->completion_note }}</li>
        <li><strong>Completed on:</strong> {{ $complaint->completed_date }}</li>
        <li><strong>Images:</strong>
            @forelse ($complaint->completionImages as $completionImage)
                <p>
                    <a href="{{ asset('storage/' . $completionImage->file_path) }}" target="_blank">
                        View Image {{ $loop->iteration }}
                    </a>
                </p>
            @empty
                <p>No images uploaded</p>
            @endforelse
        </li>
    </ul>
    <p>Thank you for your patience.</p>
    </div>
</body>

</html>

