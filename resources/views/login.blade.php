@extends('layouts.app')

@section('content')
<div class="jumbotron">

    <div class="card-container">

        <div class="card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span id="email-error" class="invalid-feedback" style="display: block;"></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            <span id="password-error" class="invalid-feedback" style="display: block; font-weight:bold;"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn">
                                <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <!-- <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">                            
                            <p>Register? <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Di sini</a></p>
                        </div>
                    </div> -->

                    <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const loginForm = document.querySelector('form');
                        const emailInput = document.getElementById('email');
                        const passwordInput = document.getElementById('password');
                        const emailError = document.getElementById('email-error');
                        const passwordError = document.getElementById('password-error');
                        const submitButton = document.querySelector('button[type="submit"]');
                        const spinner = document.getElementById('spinner');

                        loginForm.addEventListener('submit', function (event) {
                            let valid = true;
                            if (!emailInput.value) {
                                emailError.textContent = 'Email harus diisi!';
                                valid = false;
                            } else {
                                emailError.textContent = '';
                            }

                            if (!passwordInput.value) {
                                passwordError.textContent = 'Password harus diisi!';
                                valid = false;
                            } else {
                                passwordError.textContent = '';
                            }

                            if (valid) {
                                spinner.style.display = 'inline-block'; 
                                submitButton.disabled = true; 
                            } else {
                                event.preventDefault();
                            }
                        });
                    });
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection