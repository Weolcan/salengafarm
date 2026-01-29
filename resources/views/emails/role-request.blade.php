<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Client Role Request</title>
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
        .info-box {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #0d6efd;
        }
        .info-box h3 {
            margin-top: 0;
            color: #0d6efd;
        }
        .info-row {
            margin: 8px 0;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-individual {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .badge-company {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🌿 Salenga Farm</h1>
        <p>New Client Role Request</p>
    </div>

    <div class="content">
        <h2>New Client Registration Request</h2>
        
        <p>A user has submitted a request to become a client. Please review their information below:</p>
        
        <div class="info-box">
            <h3>Request Information</h3>
            <div class="info-row">
                <span class="info-label">Request ID:</span> #{{ $roleRequest->id }}
            </div>
            <div class="info-row">
                <span class="info-label">Account Type:</span> 
                <span class="badge badge-{{ $roleRequest->account_type }}">
                    {{ $roleRequest->account_type === 'individual' ? 'Individual / Homeowner' : 'Company / Organization' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Status:</span> <strong>{{ ucfirst($roleRequest->status) }}</strong>
            </div>
            <div class="info-row">
                <span class="info-label">Submitted:</span> {{ $roleRequest->created_at->format('M d, Y H:i A') }}
            </div>
        </div>

        <div class="info-box">
            <h3>Applicant Details</h3>
            <div class="info-row">
                <span class="info-label">Full Name:</span> {{ $roleRequest->full_name }}
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span> {{ $roleRequest->email }}
            </div>
            <div class="info-row">
                <span class="info-label">Contact Number:</span> {{ $roleRequest->contact_number }}
            </div>
            
            @if($roleRequest->account_type === 'individual')
                @if($roleRequest->gender)
                <div class="info-row">
                    <span class="info-label">Gender:</span> {{ ucfirst($roleRequest->gender) }}
                </div>
                @endif
                @if($roleRequest->address)
                <div class="info-row">
                    <span class="info-label">Address:</span> {{ $roleRequest->address }}
                </div>
                @endif
            @else
                @if($roleRequest->company_name)
                <div class="info-row">
                    <span class="info-label">Company Name:</span> {{ $roleRequest->company_name }}
                </div>
                @endif
                @if($roleRequest->company_address)
                <div class="info-row">
                    <span class="info-label">Company Address:</span> {{ $roleRequest->company_address }}
                </div>
                @endif
            @endif
        </div>

        <div class="info-box">
            <h3>User Account Information</h3>
            <div class="info-row">
                <span class="info-label">User ID:</span> {{ $user->id }}
            </div>
            <div class="info-row">
                <span class="info-label">Current Role:</span> {{ ucfirst($user->role) }}
            </div>
            <div class="info-row">
                <span class="info-label">Registered Since:</span> {{ $user->created_at->format('M d, Y') }}
            </div>
        </div>

        @if($roleRequest->message)
        <div class="info-box">
            <h3>Additional Message</h3>
            <p>{{ $roleRequest->message }}</p>
        </div>
        @endif

        <h3>Next Steps</h3>
        <ul>
            <li>Review the applicant's information and request history</li>
            <li>Go to User Management → Role Requests tab to approve or reject</li>
            <li>Contact the user if additional verification is needed</li>
            <li>Once approved, the user will be upgraded to client status</li>
        </ul>
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
