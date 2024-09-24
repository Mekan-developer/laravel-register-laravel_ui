@extends('layouts.auth')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-gray-100 shadow-md rounded-lg">
                <div class="bg-gray-100 px-4 py-2 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Register') }}</h2>
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('send.otp') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="company_name" class="block text-md font-medium text-gray-700 mb-1">{{ __('company_name') }}</label>
                            <input id="company_name" type="text" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                            @error('company_name')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-md font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="contact_phone" class="block text-md font-medium text-gray-700 mb-1">{{ __('contact_phone') }}</label>
                            <input id="contact_phone" type="tel" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="contact_phone" value="{{ old('contact_phone') }}" required autocomplete="contact_phone" autofocus>

                            @error('contact_phone')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-md font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                            <input id="password" type="password" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="block text-md font-medium text-gray-700 mb-1">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="mt-1 py-2  block w-full border-gray-300 rounded-sm shadow-sm" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
