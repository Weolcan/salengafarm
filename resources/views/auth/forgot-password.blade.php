<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <div class="min-h-screen">
        <div class="login-container position-relative">
            
        <div class="max-w-md bg-white rounded-3xl shadow-2xl p-10">
            <div class="text-center mb-6">
                <h2>Reset Password</h2>
                <p class="text-sm text-gray-600">Enter your email to reset your password</p>
            </div>

            @if (session('status'))
                <div class="success-message text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <input type="email" 
                               id="email"
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               placeholder="Enter your email"
                               autocomplete="email"
                               class="form-input">
                    </div>
                    @error('email')
                        <p class="error-message mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" id="reset-button" class="sign-in-btn">
                        <span id="button-text">Send Reset Link</span>
                        <span id="button-loader" class="spinner" style="display: none;"></span>
                    </button>
                </div>
                
                <!-- Full page loading overlay -->
                <div id="loading-overlay" class="loading-overlay" style="display: none;">
                    <div class="loading-spinner-container">
                        <div class="loading-spinner"></div>
                        <p>Sending reset link...</p>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
    </div>

    <style>
        /* Reset any inherited backgrounds */
        body, .min-h-screen, .bg-gray-100 {
            background: transparent !important;
        }
        
        /* Loading indicator styles */
        .spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-left: 8px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 0.8s linear infinite;
            vertical-align: middle;
        }
        
        /* Full page loading overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .loading-spinner-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            text-align: center;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Container positioning */
        .login-container {
            position: relative;
            width: fit-content;
            margin: 0 auto;
            padding-top: 40px;
            background: transparent;
        }
        
        /* Input field styling */
        .input-group {
            position: relative;
            width: 100%;
        }
        
        .form-input {
            display: block;
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            background-color: #F9FAFB;
            color: #111827;
            font-size: 14px;
            transition: border-color 0.15s ease-in-out;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        /* Panel styling */
        .max-w-md {
            width: 100%;
            max-width: 28rem;
            margin: 0 auto;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Center the panel */
        .min-h-screen {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28rem;
            margin: 0 auto;
        }

        /* Override guest layout styles */
        .bg-white, .bg-gray-100 {
            background: white !important;
            border-radius: 1.5rem;
            width: 100%;
        }

        /* Override any card styles */
        .card {
            background: transparent !important;
            backdrop-filter: none !important;
        }

        /* Ensure the form container matches panel size */
        .space-y-6 {
            width: 100%;
        }

        @media (max-width: 640px) {
            .min-h-screen {
                width: 90%;
            }
        }
    </style>
    <script>
        // Form submission with loading screen
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const buttonText = document.getElementById('button-text');
            const buttonLoader = document.getElementById('button-loader');
            const loadingOverlay = document.getElementById('loading-overlay');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Show button spinner
                    buttonText.textContent = 'Processing...';
                    buttonLoader.style.display = 'inline-block';
                    document.getElementById('reset-button').disabled = true;
                    
                    // Show the full page loading overlay after a small delay
                    setTimeout(function() {
                        loadingOverlay.style.display = 'flex';
                    }, 500);
                });
            }
            
            // Auto-hide messages after 5 seconds
            const errorMessage = document.querySelector('.error-message');
            const successMessage = document.querySelector('.success-message');
            
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
            
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</x-guest-layout>
