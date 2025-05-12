<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <div class="min-h-screen">
        <div class="login-container position-relative">
            
        <div class="max-w-md bg-white rounded-3xl shadow-2xl p-10">
            <div class="text-center mb-6">
                <h2>Create Account</h2>
                <p class="text-gray-600 text-sm">Join us by creating your account</p>
            </div>

            @if ($errors->any())
                <div class="error-message" id="errorMessage">
                    @if($errors->has('password_confirmation'))
                        The confirm password field confirmation does not match.
                    @else
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name" class="form-label">First Name</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       id="first_name"
                                       name="first_name" 
                                       value="{{ old('first_name') }}" 
                                       required 
                                       placeholder="First name"
                                       autocomplete="given-name"
                                       class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name" class="form-label">Last Name</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       id="last_name"
                                       name="last_name" 
                                       value="{{ old('last_name') }}" 
                                       required 
                                       placeholder="Last name"
                                       autocomplete="family-name"
                                       class="form-input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" 
                               id="contact_number"
                               name="contact_number" 
                               value="{{ old('contact_number') }}" 
                               required 
                               placeholder="Enter your contact number"
                               autocomplete="tel"
                               class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_name" class="form-label">Company Name</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-building"></i>
                        </span>
                        <input type="text" 
                               id="company_name"
                               name="company_name" 
                               value="{{ old('company_name') }}" 
                               required 
                               placeholder="Enter your company name"
                               autocomplete="organization"
                               class="form-input">
                    </div>
                </div>

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
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       id="password"
                                       name="password" 
                                       required 
                                       placeholder="Create a password"
                                       autocomplete="new-password"
                                       class="form-input">
                                <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                                    <i class="fas fa-eye" id="toggleIcon1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       id="password_confirmation"
                                       name="password_confirmation" 
                                       required 
                                       placeholder="Confirm password"
                                       autocomplete="new-password"
                                       class="form-input">
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                    <i class="fas fa-eye" id="toggleIcon2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="sign-in-btn">
                        Create Account
                    </button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark">Sign In</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    </div>

    <style>
        /* Adjust all text sizes */
        .form-label {
            font-size: 0.75rem;
            margin-bottom: 0.15rem;
        }

        .form-input {
            font-size: 0.75rem;
        }

        .text-gray-600 {
            font-size: 0.75rem;
        }

        h2 {
            font-size: 1.1rem;
        }

        .sign-in-btn {
            font-size: 0.75rem;
            padding: 0.4rem 1rem;
        }

        .error-message {
            font-size: 0.75rem;
        }

        .text-primary {
            font-size: 0.75rem;
        }

        /* Adjust input placeholder text */
        .form-input::placeholder {
            font-size: 0.75rem;
        }

        /* Adjust icon sizes */
        .input-icon {
            font-size: 0.8rem;
        }

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
            max-width: 38rem;
            margin: 0 auto;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 1rem !important;
        }

        /* Center the panel */
        .min-h-screen {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38rem;
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

        /* Reduce spacing between form groups */
        .form-group {
            margin-bottom: 0.5rem;
        }

        /* Adjust vertical spacing in the form */
        .space-y-6 > * {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
        }

        /* Adjust spacing after header */
        .text-center.mb-6 {
            margin-bottom: 0.75rem;
        }

        /* Reduce input group padding */
        .input-group {
            padding: 0.2rem 0.4rem;
        }

        /* Adjust spacing for bottom text */
        .text-center.mt-6 {
            margin-top: 0.75rem !important;
        }

        @media (max-width: 640px) {
            .min-h-screen {
                width: 90%;
            }
        }

        /* Add row and column styling */
        .row {
            display: flex;
            margin: 0 -0.5rem;
        }

        .col-md-6 {
            flex: 0 0 50%;
            padding: 0 0.5rem;
        }
    </style>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Add auto-hide functionality for error messages
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.transition = 'opacity 0.5s ease';
                    errorMessage.style.opacity = '0';
                    setTimeout(function() {
                        errorMessage.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
</x-guest-layout>


