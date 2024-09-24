@extends('layouts.auth')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-100 px-4 py-2 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Reset Password') }}</h2>
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="mt-1 p-2  block w-full border-gray-300 rounded-sm shadow-sm" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>

                            <input id="password" type="password" class="mt-1 p-2  block w-full border-gray-300 rounded-sm shadow-sm" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="mt-1 p-2  block w-full border-gray-300 rounded-sm shadow-sm" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-between mb-0">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
