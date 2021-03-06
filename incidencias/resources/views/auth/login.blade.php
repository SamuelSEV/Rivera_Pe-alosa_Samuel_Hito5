@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  ">

            <div class="card m-3 rounded-3 d-flex justify-content-center" >
                <div class="card-header text-center d-flex justify-content-center encabezado" >
                    <span class="rounded-circle float-center"><i class="fas fa-user-circle fa-3x "></i></span>
                </div>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                <div class="d-flex justify-content-center" >
                    <form method="POST" class="p-2 col-12" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4 text-center d-flex justify-content-center">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                            </label>
                        </div>

                        <div class="mt-4 text-center d-flex justify-content-center">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 block mt-1 w-full" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                            @endif
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <x-jet-button class="ml-4 boton block mt-1  text-center">
                                {{ __('Login') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection