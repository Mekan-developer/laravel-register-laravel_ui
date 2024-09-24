@extends('layouts.auth')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-100 px-4 py-2 border-b">
                    {{-- <h2 class="text-lg font-semibold">{{ __('Login') }}</h2> --}}
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="verify" class="block text-md font-medium text-gray-700 mb-1">Verify OTP</label>
                            <input id="verify" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="otp" required autocomplete="current-verify">

                            @error('otp')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mb-0">
                            <div>
                                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    verify
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
