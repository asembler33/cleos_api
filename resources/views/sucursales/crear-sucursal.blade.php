@extends('layouts.master')
@section('title')
    @lang('translation.Basic_Elements')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Forms
        @endslot
        @slot('title')
            Agregar Sucursal
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Nombre Sucursal</label>
                                    <input class="form-control" type="text" id="nombreSucursal" name="nombreSucursal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="example-search-input" class="form-label">Comuna</label>
                                <select class="form-control" name="comuna" id="comuna">
                                    <option value="">[Seleccione comuna...]</option>
                                    @foreach ($comunas as $comuna)
                                        <option value="{{ $comuna->comuna_id }}">{{ $comuna->comuna_nombre }}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="example-text-input" class="form-label">Tipo Sucursal</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input tipoSucursal" type="radio" name="tipoSucursal"
                                        id="tipoSucursalOnline" value="1">
                                    <label class="form-check-label" for="tipoSucursalOnline">
                                        Sucursal Online
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input tipoSucursal" type="radio" name="tipoSucursal"
                                        id="tipoSucursalFisica" value="2">
                                    <label class="form-check-label" for="tipoSucursalFisica">
                                        Sucursal Física
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="example-search-input" class="form-label">Dirección</label>
                                <input class="form-control" type="text" id="direccion" name="direccion">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Teléfono</label>
                                <input class="form-control" type="text" id="telefono" name="telefono">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Correo</label>
                                <input class="form-control" type="text" id="correo" name="correo">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-left">
                        <div class="col-md-2">
                            <button type="button" name="btnGuardarSucursal" id="btnGuardarSucursal"class="btn btn-primary">Guardar</button>
                            <a href="/sucursales/lista-sucursales" id="btnVolverSucursal" class="btn btn-danger">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
