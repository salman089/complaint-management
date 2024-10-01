<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Created</title>
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Employee Created</h1>
        <p>Dear {{ $employee->name }},</p>
        <p>We have enrolled you in our company. Please Check out for the tasks assigned to you.</p>
        <ul>
            <li><strong>Employer ID:</strong> {{ $employee->id }}</li>
            <li><strong>Employer Name:</strong> {{ $employee->name }}</li>
            <li><strong>Phone Number:</strong> {{ $employee->phone }}</li>
            <li><strong>Street Address:</strong> {{ $employee->address }}</li>
        </ul>
        <p>Thank you for joining our company. We look forward to your work.</p>
    </div>
</body>

</html>
