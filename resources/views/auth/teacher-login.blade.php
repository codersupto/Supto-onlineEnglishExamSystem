@extends('layouts.app')

@section('title', 'Teacher Login')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-4">

                <div class="card login-form shadow-lg">
                    <div class="icon-wrp shadow">
                        <i class="fas fa-user-tie fa-4x text-primary"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('teacher.login.submit') }}" class="">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-at"></i></div>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember me</label>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div><!-- /.col-8 -->
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('extra-script')
    <script>
        $(document).ready(function () {
            var height = $(window).innerHeight();
            $('body').css({'height': height});
        });
    </script>
@endsection
