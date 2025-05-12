<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Rendering Request View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 2rem;
            background-color: #f8f9fa;
        }
        .error-container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .error-box {
            background-color: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 0.25rem;
            margin-top: 1rem;
            overflow: auto;
        }
        .trace-box {
            background-color: #f1f1f1;
            padding: 1rem;
            border-radius: 0.25rem;
            margin-top: 1rem;
            font-family: monospace;
            white-space: pre-wrap;
            overflow: auto;
            max-height: 400px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="text-danger">View Rendering Error</h1>
        <p class="lead">There was a problem rendering the request view.</p>
        
        <div class="error-box">
            <h5>Error Message:</h5>
            <p>{{ $error }}</p>
        </div>
        
        <div class="my-4">
            <a href="{{ route('requests.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to Requests
            </a>
        </div>
        
        @if(app()->environment('local', 'development', 'testing'))
        <h4 class="mt-4">Debug Information</h4>
        <div class="trace-box">
            {{ $trace }}
        </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 