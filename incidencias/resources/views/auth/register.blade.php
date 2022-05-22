@extends('layouts.master')
@section('title', 'registro')
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                <div class="card m-3 rounded-3 d-flex justify-content-center">
                    <div class="card-header text-center d-flex justify-content-center encabezado">
                        <span class="rounded-circle float-center"><i class="fas fa-user-circle fa-3x "></i></span>
                    </div>

                    <x-jet-validation-errors class="mb-4" />
                    <div class="d-flex justify-content-center">
                        <form method="POST" class="p-2 col-12" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                    required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required
                                    pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[iespoligonosur]+([.][org]+)"
                                    placeholder="@iespoligonosur.org" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms" />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
                                                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-content-center mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('login') }}">
                                    {{ __('Ya estas registrado?') }}
                                </a>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <x-jet-button class="ml-4 boton block mt-1  text-center">
                                    {{ __('Registrar') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection
