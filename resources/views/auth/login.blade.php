@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f3f4f6 !important;
        }

        .tw-card {
            background: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px #0001;
            padding: 2rem;
        }

        .tw-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .tw-label {
            display: block;
            color: #374151;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .tw-input {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            color: #374151;
            background: #f9fafb;
            transition: border-color 0.2s;
        }

        .tw-input:focus {
            outline: none;
            border-color: #2563eb;
            background: #fff;
        }

        .tw-error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }

        .tw-btn {
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            padding: 0.5rem 2rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            width: 100%;
        }

        .tw-btn:hover {
            background: #1d4ed8;
        }

        .tw-link {
            color: #2563eb;
            font-size: 0.875rem;
            margin-left: 1rem;
            text-decoration: underline;
        }

        .tw-link:hover {
            color: #1d4ed8;
        }

        .tw-form-group {
            margin-bottom: 1.25rem;
        }

        .tw-flex {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
        }

        .tw-center {
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="tw-bg tw-center">
        <div class="tw-card" style="width: 100%; max-width: 400px;">
            <div class="tw-title">
                <img src="{{ asset('images/icon/esokhari.png') }}" alt="Logo"
                    style="width: auto; height: 50px; margin-bottom: 0.5rem;">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="tw-form-group">
                    <label for="username" class="tw-label">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required
                        autocomplete="username" autofocus class="tw-input @error('username') tw-error-border @enderror">
                    @error('email')
                        <span class="tw-error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="tw-form-group">
                    <label for="password" class="tw-label">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="tw-input @error('password') tw-error-border @enderror">
                    @error('password')
                        <span class="tw-error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="tw-form-group">
                <div class="flex items-center">
                    <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="tw-label" style="font-size:0.9rem; color:#374151; font-weight:400; margin-bottom:0;" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div> --}}
                <div class="tw-flex">
                    <button type="submit" class="tw-btn">
                        Login
                    </button>
                    {{-- @if (Route::has('password.request'))
                    <a class="tw-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
                </div>
            </form>
        </div>
    </div>
@endsection
