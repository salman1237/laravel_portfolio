<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-white">Welcome Back</h2>
            <p class="text-gray-400 mt-1">Sign in to access admin panel</p>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-white/5 border-white/20 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <button type="submit" class="btn-gradient">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
