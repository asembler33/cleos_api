@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')  @endslot
@slot('title') Sucursales @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="/sucursales/crear-sucursal" class="btn btn-primary">Agregar Sucursal</a>
                    </div>
                </div>
            </div>
            <div id="modalEditarSucursal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="false">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Editar Sucursal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formSucursal" action="" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Nombre Sucursal</label>
                                            <input class="form-control" type="text" id="nombreSucursal" name="nombreSucursal">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label">Comuna</label>
                                            <select class="form-control" name="comunas" id="comunas">
                                                <option value="">[Seleccione comuna...]</option>
                                                @foreach($comunas as $comuna)
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
                                                <label class="form-check-label" for="">
                                                    Sucursal Online
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input tipoSucursal" type="radio" name="tipoSucursal"
                                                    id="tipoSucursalFisica" value="2">
                                                <label class="form-check-label" for="">
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
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="idSucursal">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" name="btnEditarServicio" id="btnEditarServicio" class="btn btn-primary waves-effect waves-light">Editar</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div class="card-body">
                <table id="datatableSucursales" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sucursal</th>
                            <th>Tipo Sucursal</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Comuna</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

