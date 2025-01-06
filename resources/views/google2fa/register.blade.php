@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card card-default">
                <h4 class="card-heading text-center mt-4">Configurar Google Authenticator</h4>

                <div class="card-body" style="text-align: center;">
                    <p>Configura la autenticación de doble factor escaneando el código QR. O usa el siguiente código <strong>{{ $secret }}</strong></p>
                    <div>
                        {!! $QR_Image !!}
                    </div>
                    <p>Debes de configurar tu aplicación Google Authenticator antes de continuar. De lo contrario no podrás iniciar sesión</p>
                    <div>
                        <a href="{{ route('complete.registration') }}" class="btn btn-primary">Completar Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
