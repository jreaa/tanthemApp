@extends('layouts.app')

@section('content')
<!--begin::Form-->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!--begin::Title-->
    <div class="pb-13 pt-lg-0 pt-5">
        <!--<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Bienvenido de vuelta!</h3>
        <span class="text-muted font-weight-bold font-size-h4">Optima Telemetria
        </span>-->
        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Bienvenido de vuelta!</h3>
        <span class="text-muted font-weight-bold font-size-h4">Optima Ingenieria
        </span>
    </div>
    <!--begin::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
        <input id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <div class="d-flex justify-content-between mt-n5">
            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Contraseña</label>
            <a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Olvido su contraseña ?</a>
        </div>
        <input id="password" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Action-->
    <div class="pb-lg-0 pb-5">
        <button type="submit" class="btn btn-success font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
            {{ __('Iniciar Sesion') }}
        </button>
    </div>
    <!--end::Action-->
</form>
<!--end::Form-->



@endsection