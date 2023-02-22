@extends('layouts.main')

@section('title', 'Register')

@section('contenido')

<div class="d-flex">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro de Usuario') }}</div>

                    <div class="card-body container-fluid">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3 mx-md-5">
                                <div class="col-md-6 col-12">
                                    <label for="nombre" class="col-md col-form-label text-md-start">{{ __('Nombre') }}</label>

                                    <div class="col-md col-12">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <label for="apellido" class="col-md col-form-label text-md-start">{{ __('Apellido') }}</label>

                                    <div class="col-md col-12">
                                        <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                        @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <div class="col-md-6 col-12">
                                    <label for="doc_persona" class="col-md col-form-label text-md-start">{{ __('Documento de Identidad') }}</label>
                                    <div class="col-md col-12">
                                        <input id="doc_persona" type="text" class="form-control @error('doc_persona') is-invalid @enderror" name="doc_persona" value="{{ old('doc_persona') }}" required autocomplete="doc_persona" autofocus>

                                        @error('doc_persona')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="username" class="col-md col-form-label text-md-start">{{ __('Username') }}</label>
                                    <div class="col-md col-12">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <label for="correo" class="col-md col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                                <div class="col-md-12">
                                    <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo">

                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <label for="fec_nac" class="col-md col-form-label text-md-start">{{ __('Fecha de Nacimiento') }}</label>

                                <div class="col-md-12">
                                    <input id="fec_nac" type="date" class="form-control @error('fec_nac') is-invalid @enderror" name="fec_nac" value="{{ old('fec_nac') }}" required autocomplete="fec_nac">

                                    @error('fec_nac')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <label for="telefono" class="col-md col-form-label text-md-start">{{ __('Telefono') }}</label>

                                <div class="col-md-12">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <label for="password" class="col-md col-form-label text-md-start">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-md-5">
                                <label for="password-confirm" class="col-md col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 d-flex">
                                    <button type="submit" class="btn btn-primary mx-auto">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
