

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Productos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save.all') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="productName" class="form-label">{{ __('Nombre del Producto') }}</label>
                            <input id="productName" type="text" class="form-control" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label">{{ __('Descripción del Producto') }}</label>
                            <textarea id="productDescription" class="form-control" name="descripcion" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productPrice" class="form-label">{{ __('Precio del Producto') }}</label>
                            <input id="productPrice" type="number" class="form-control" name="precio" required>
                        </div>

                        <div class="mb-3">
                            <p>{{ __('Selecciona la base de datos para guardar la información:') }}</p>
                            <div class="btn-group" role="group" aria-label="Database Selection">
                                <button type="submit" class="btn btn-primary" name="database" value="all">{{ __('Guardar en todas las bases de datos') }}</button>
                                <button type="submit" class="btn btn-primary" name="database" value="sqlsrv">{{ __('SQL Server') }}</button>
                                <button type="submit" class="btn btn-primary" name="database" value="oracle">{{ __('Oracle') }}</button>
                                <button type="submit" class="btn btn-primary" name="database" value="pgsql">{{ __('Google Cloud') }}</button>
                            </div>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('kpi') }}" class="mt-3">
                        <button type="submit" class="btn btn-secondary">{{ __('Mostrar KPI') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
