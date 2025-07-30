<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <div class="min-h-screen">
        <div class="login-container position-relative">
            <div class="max-w-md bg-white rounded-3xl shadow-2xl p-10">
                <div class="text-center mb-6">
                    <h2>Reset Password</h2>
                    <p class="text-gray-600 text-sm">Enter your new password below</p>
                </div>

            @if ($errors->any())
                <div class="error-message" id="errorMessage">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('status'))
                <div class="success-message" id="successMessage">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('password.store') }}" id="reset-form">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="clean-input-group">
                        <span class="input-icon">@</span>
                        <input type="email" 
                               id="email"
                               name="email" 
                               value="{{ old('email', $request->email) }}" 
                               required 
                               readonly
                               class="clean-input"
                               autocomplete="email">
                    </div>
                </div>

                <div class="form-group password-field-wrapper">
                    <!-- Password requirements speech bubble -->
                    <div id="password-requirements" class="password-tooltip">
                        <h4 class="font-medium mb-1 text-xs">Password Requirements:</h4>
                        <ul>
                            <li id="req-length"><i class="fas fa-check-circle"></i> 8+ characters</li>
                            <li id="req-uppercase"><i class="fas fa-check-circle"></i> At least one uppercase letter</li>
                            <li id="req-lowercase"><i class="fas fa-check-circle"></i> At least one lowercase letter</li>
                            <li id="req-number"><i class="fas fa-check-circle"></i> At least one number</li>
                            <li id="req-special"><i class="fas fa-check-circle"></i> At least one special character (@$!%*#?&)</li>
                            <li id="req-sequential"><i class="fas fa-check-circle"></i> No sequential characters (e.g., 1234, abcd)</li>
                            <li id="req-dictionary"><i class="fas fa-check-circle"></i> No dictionary words</li>
                        </ul>
                    </div>
                    <label for="password" class="form-label">New Password</label>
                    <div class="clean-input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               id="password"
                               name="password" 
                               required 
                               class="clean-input password-field"
                               onfocus="showPasswordRequirements()"
                               onblur="hidePasswordRequirements()"
                               oninput="validatePassword()"
                               autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                            <i class="fas fa-eye" id="toggleIcon1"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="clean-input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               id="password_confirmation"
                               name="password_confirmation" 
                               required 
                               class="clean-input password-field"
                               autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                            <i class="fas fa-eye" id="toggleIcon2"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <button type="submit" id="reset-button" class="sign-in-btn">
                        <span id="button-text">Reset Password</span>
                        <span id="button-loader" class="spinner" style="display: none;"></span>
                    </button>
                </div>
                
                <!-- Full page loading overlay -->
                <div id="loading-overlay" class="loading-overlay" style="display: none;">
                    <div class="loading-spinner-container">
                        <div class="loading-spinner"></div>
                        <p>Processing your request...</p>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Remember your password? 
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Login
                        </a>
                    </p>
                </div>
            </form>
            </div>
        </div>
    </div>

    <style>
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
        
        /* Password tooltip */
        .password-field-wrapper {
            position: relative;
        }
        
        .password-tooltip {
            display: none;
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            width: 280px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 100;
            left: 50%;
            transform: translateX(-50%);
            top: -5px;
            margin-top: -175px;
        }
        
        .password-tooltip h4 {
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .password-tooltip ul {
            padding-left: 5px;
            margin: 0;
        }
        
        .password-tooltip li {
            font-size: 12px;
            margin-bottom: 5px;
            list-style-type: none;
            color: #666;
        }
        
        .password-tooltip li i {
            margin-right: 5px;
            color: #ccc;
        }
        
        .password-tooltip li.valid i {
            color: #2ecc71;
        }
    </style>

    <script>
        // Form submission with loading screen
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('reset-form');
            const buttonText = document.getElementById('button-text');
            const buttonLoader = document.getElementById('button-loader');
            const loadingOverlay = document.getElementById('loading-overlay');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Basic client-side validation first
                    const password = document.getElementById('password').value;
                    const passwordConfirm = document.getElementById('password_confirmation').value;
                    
                    if (password !== passwordConfirm) {
                        return; // Let the form validation handle this error
                    }
                    
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
            
            // Auto-hide error and success messages after 5 seconds
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
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
        
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
        
        function showPasswordRequirements() {
            const requirements = document.getElementById('password-requirements');
            if (requirements) {
                requirements.style.display = 'block';
            }
        }
        
        function hidePasswordRequirements() {
            const requirements = document.getElementById('password-requirements');
            if (requirements) {
                requirements.style.display = 'none';
            }
        }
        
        function validatePassword() {
            const password = document.getElementById('password').value;
            
            // Check length
            const lengthReq = document.getElementById('req-length');
            if (password.length >= 8) {
                lengthReq.classList.add('valid');
            } else {
                lengthReq.classList.remove('valid');
            }
            
            // Check uppercase
            const upperReq = document.getElementById('req-uppercase');
            if (/[A-Z]/.test(password)) {
                upperReq.classList.add('valid');
            } else {
                upperReq.classList.remove('valid');
            }
            
            // Check lowercase
            const lowerReq = document.getElementById('req-lowercase');
            if (/[a-z]/.test(password)) {
                lowerReq.classList.add('valid');
            } else {
                lowerReq.classList.remove('valid');
            }
            
            // Check number
            const numberReq = document.getElementById('req-number');
            if (/[0-9]/.test(password)) {
                numberReq.classList.add('valid');
            } else {
                numberReq.classList.remove('valid');
            }
            
            // Check special char
            const specialReq = document.getElementById('req-special');
            if (/[@$!%*#?&]/.test(password)) {
                specialReq.classList.add('valid');
            } else {
                specialReq.classList.remove('valid');
            }
            
            // Simple check for sequential characters
            const sequentialReq = document.getElementById('req-sequential');
            let hasSequential = false;
            for (let i = 0; i < password.length - 3; i++) {
                if (
                    (password.charCodeAt(i) + 1 === password.charCodeAt(i+1) &&
                    password.charCodeAt(i+1) + 1 === password.charCodeAt(i+2) &&
                    password.charCodeAt(i+2) + 1 === password.charCodeAt(i+3)) ||
                    (password.charCodeAt(i) - 1 === password.charCodeAt(i+1) &&
                    password.charCodeAt(i+1) - 1 === password.charCodeAt(i+2) &&
                    password.charCodeAt(i+2) - 1 === password.charCodeAt(i+3))
                ) {
                    hasSequential = true;
                    break;
                }
            }
            if (!hasSequential) {
                sequentialReq.classList.add('valid');
            } else {
                sequentialReq.classList.remove('valid');
            }
            
            // Simple check for dictionary words
            const dictionaryReq = document.getElementById('req-dictionary');
            const commonWords = ['password', 'love', 'admin', 'welcome', 'qwerty', 'abc', 'secret', 'letmein'];
            let hasDictionaryWord = false;
            const lowerPassword = password.toLowerCase();
            
            for (const word of commonWords) {
                if (lowerPassword.includes(word)) {
                    hasDictionaryWord = true;
                    break;
                }
            }
            
            if (!hasDictionaryWord) {
                dictionaryReq.classList.add('valid');
            } else {
                dictionaryReq.classList.remove('valid');
            }
        }
    </script>
</x-guest-layout>
