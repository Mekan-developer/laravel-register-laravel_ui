@extends('layouts.auth')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-100 px-4 py-2 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Login') }}</h2>
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block text-md font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-md font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                            <input id="password" type="password" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4 flex items-center">
                            <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-sm" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="flex items-center justify-between mb-0">
                            <div>
                                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
