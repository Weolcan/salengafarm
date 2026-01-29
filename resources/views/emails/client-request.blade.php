<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Client Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2d5d31;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border: 1px solid #dee2e6;
        }
        .footer {
            background-color: #e9ecef;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            font-size: 14px;
            color: #6c757d;
        }
        .user-info {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #0d6efd;
        }
        .message-box {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🌿 Salenga Farm</h1>
        <p>New Client Request</p>
    </div>

    <div class="content">
        <h2>New Client Registration Request</h2>
        
        <p>A user has requested to become a client. Please review their information below:</p>
        
        <div class="user-info">
            <h3>User Information</h3>
            <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            @if($user->contact_number)
            <p><strong>Contact Number:</strong> {{ $user->contact_number }}</p>
            @endif
            @if($user->company_name)
            <p><strong>Company:</strong> {{ $user->company_name }}</p>
            @endif
            <p><strong>Current Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Registered Since:</strong> {{ $user->created_at->format('M d, Y') }}</p>
        </div>

        @if($userMessage)
        <div class="message-box">
            <h3>User's Message</h3>
            <p>{{ $userMessage }}</p>
        </div>
        @endif

        <h3>Next Steps</h3>
        <ul>
            <li>Review the user's information and request history</li>
            <li>Contact the user via email or phone to verify their business</li>
            <li>Update their account role to "client" in the admin panel if approved</li>
            <li>Send them a welcome email with client benefits and instructions</li>
        </ul>

        <p><strong>To update this user to a client:</strong> Go to the Users management page in the admin panel and change their role.</p>
    </div>

    <div class="footer">
        <p>
            <strong>Salenga Farm Admin Notification</strong><br>
            This email was sent automatically when a user requested to become a client.<br>
            <br>
            <em>Sent on {{ now()->format('F d, Y H:i:s') }}</em>
        </p>
    </div>
</body>
</html>
