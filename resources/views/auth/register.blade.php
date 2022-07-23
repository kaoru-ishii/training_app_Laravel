<!DOCTYPE html>
<html lang="ja">
@extends('layouts.head')
<header>
    <h1>Training</h1>
</header>
<body>
    <main>
        <div class="container">
            <img class="image" src="{{ asset('img/top.jpg') }} " >
            <div class="main">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h1 class="title">トレーニング日記</h1>
                    <h2 class="title">新規会員登録</h2>
                    <input class="input-form" required type="name" name="name" placeholder="ユーザー名" maxlength="25">
                    <input class="input-form" required type="email" name="email" placeholder="メールアドレス">
                    <input class="input-form" required type="password" name="password" placeholder="パスワード" minlength="8">
                    <input class="input-form" required type="password" name="password_Confirmation" placeholder="パスワード再確認" minlength="8">
                    {{-- <input class="method-btn" type="submit" value="新規登録"> --}}
                    <button type="submit" class="method-btn">
                        {{ __('新規登録') }}
                    </button>
                </form>
                <p>既に登録済みの方は<a href="{{ route('login') }}">こちら</a>からログインしてください</p>
            </div>
        </div>
    </main>
</body>
@extends('layouts.footer')
</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
