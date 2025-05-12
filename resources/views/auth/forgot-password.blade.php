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
                        <span class="input-icon">@</span>
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
                    <button type="submit" class="sign-in-btn">
                        Send Reset Link
                    </button>
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

        /* Container positioning */
        .login-container {
            position: relative;
            width: fit-content;
            margin: 0 auto;
            padding-top: 40px;
            background: transparent;
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
</x-guest-layout>
