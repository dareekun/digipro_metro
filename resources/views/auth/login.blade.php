@extends('layouts.app')

@section('content')
<div class="p-5 mt-5">
    <div class="row">
        <div class="cell-6 offset-3">
            <h4>
                {{ __('Login') }}
            </h4>
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="cell-6 offset-3">
                <div class="row">
                    <div class="cell-4"><label for="username">{{ __('NIK') }}</label></div>
                    <div class="cell-8">
                        <input type="text" data-role="input" class="u-full-width" name="username"
                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell-6 offset-3">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="cell-6 offset-3">
                <div class="row">
                    <div class="cell-4"><label for="email">{{ __('Password') }}</label></div>
                    <div class="cell-8">
                        <input type="password" data-role="input" class="u-full-width" name="password" required
                            autocomplete="current-password">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell-6 offset-3">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="cell-6 offset-3">
                <div class="row">
                    <div class="cell-3 offset-4">
                        <label class="example-send-yourself-copy">
                            <input type="checkbox" data-role="checkbox" data-style="2"
                                data-caption="{{ __('Remember Me') }}" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                        </label>
                    </div>
                    <div class="cell-2">
                        <button type="submit" class="button primary w-100">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell-6 offset-3">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection