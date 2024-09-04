<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Sent</title>
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
        <h1>Quotation Sent Successfully</h1>
        <p>Dear {{ $quotation->complaint->user->name }},</p>
        <p>We have generated a quotation for your complaint. Here are the details:</p>
        <ul>
            <li><strong>Complaint:</strong> {{ $quotation->complaint->complaint }}</li>
            <li><strong>Price:</strong> ₹{{ number_format($quotation->price, 2) }}</li>
            <li><strong>Quotation Details:</strong> {{ $quotation->quotation_details }}</li>
            <li><strong>Additional Notes:</strong> {{ $quotation->additional_notes ?? 'N/A' }}</li>
        </ul>
        <p>Thank you for choosing our services. We look forward to assisting you further.</p>
    </div>
</body>

</html>
