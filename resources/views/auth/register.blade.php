{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('fontend.master')
@section('master')
    <!-- user-area  -->

    <div class="container">

        <div class="row">
            <div class="col-md-12 m200 mt100">
                <div class="login-area">
                    <div class="form-area">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login-data">
                                <h5>user name</h5>
                                <input type="text" class="user-field" name="name" id="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="login-data">
                                <h5>user email</h5>
                                <input type="email" class="user-field" name="email" id="email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="login-data">
                                <h5> password</h5>
                                <input type="password" class="user-field" name="password" required
                                    autocomplete="new-password" id="password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="login-data">
                                <h5>Confirm password</h5>
                                <input type="password" class="user-field" name="password_confirmation" required
                                    autocomplete="new-password" id="password_confirmation">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                            </div>
                            <div class="logo-social-media">

                            </div>
                            <button type="submit" class="submit">create account</button>

                        </form>
                    </div>
                    <div class="login-pic-area">
                        <!--<img src="{{ asset('fontend/image/add/login.webp') }}" alt="">-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
