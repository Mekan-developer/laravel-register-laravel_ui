@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-100 px-4 py-2 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Dashboard') }}</h2>
                </div>

                <div class="p-4">
                    @if (session('status'))
                        <div class="bg-green-500 text-white p-2 rounded mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
