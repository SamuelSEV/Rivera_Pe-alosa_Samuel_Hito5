@extends('layouts.master')
@section('title', 'Password racuperación')
@section('content')
<div class="row justify-content-center">
    <div class="col-4 ">

        <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4" >
                    <x-jet-button class="ml-4" style="background-color: #62B56F; color:black">
                        {{ __('Email Password Reset Link') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection