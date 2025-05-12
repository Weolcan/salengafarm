<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <div class="min-h-screen">
        <div class="max-w-md bg-white rounded-3xl shadow-2xl p-10">
            <div class="text-center">
                <h2>Reset Password</h2>
                <p class="text-gray-600">Enter your new password below</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email">Email Address</label>
                    <input type="email" 
                           id="email"
                           name="email" 
                           value="{{ old('email', $request->email) }}" 
                           required 
                           autofocus 
                           autocomplete="email">
                </div>

                <div>
                    <label for="password">New Password</label>
                    <input type="password" 
                           id="password"
                           name="password" 
                           required 
                           autocomplete="new-password">
                </div>

                <div>
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" 
                           id="password_confirmation"
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password">
                </div>

                <div>
                    <button type="submit">
                        Reset Password
                    </button>
                </div>

                <div class="text-center text-sm">
                    <p class="text-gray-600">
                        Remember your password? 
                        <a href="{{ route('login') }}">Back to login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
