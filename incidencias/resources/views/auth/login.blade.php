@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-4 ">

            <div class="card mt-1 mb-1 rounded-3 " style="background-color: rgb(132,206,157); color:black">
                <div class="card-header text-center d-flex justify-content-center " style="background-color: #62B56F; color:black">
                    <span class="rounded-circle float-center"><i class="fas fa-user-circle fa-3x " style="color: white;"></i></span>
                </div>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" class="p-2" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-content-center mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-jet-button class="ml-4 " style="background-color: #62B56F; color:black">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection