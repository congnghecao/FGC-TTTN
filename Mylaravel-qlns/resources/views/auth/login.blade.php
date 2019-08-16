@extends('layouts.app')

@section('login')
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="login-box">
        <form class="login-form" action="{{ route('login') }}" method="post">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>{{ __('Đăng nhập') }}</h3>
            <div class="form-group">
                <label for="email" class="control-label m-0">{{ __('Tài khoản') }}</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="control-label m-0">{{ __('Mật khẩu') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"><span class="label-text">{{ __('Nhớ mật khẩu') }}</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">{{ __('Đăng ký ') }}
                    <i class="fa fa-angle-right fa-fw"></i></a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Đăng nhập') }}
                </button>
            </div>
        </form>
        <form class="forget-form" method="POST" action="{{ route('register') }}">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>{{ __('Đăng ký') }}</h3>
            <div class="form-group m-0">
                <label for="name" class="col-form-label p-0">{{ __('Họ tên') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group m-0">
                <label for="email" class="col-form-label p-0">{{ __('Tài khoản') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group m-0">
                <label for="password" class="col-form-label p-0">{{ __('Mật khẩu') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm"
                       class="col-form-label p-0">{{ __('Nhập lại mật khẩu') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       required autocomplete="new-password">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" id="dangky" type="submit"><i class="fa fa-unlock fa-lg fa-fw">
                </i>{{ __('Đăng ký') }}</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Đăng
                        nhập</a></p>
            </div>
        </form>
    </div>
</section>
@endsection