@extends('layouts.master')
@section('title') @lang('translation.Data_Tables')  @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title') Servicios @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ url("/servicios/crear-servicio") }}"  class="btn btn-primary">Agregar Servicios</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url("/especialidades/lista-especialidades") }}" class="btn btn-primary">Especialidades</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="modalEditarServicio" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="false">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Editar Servicio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formServicio" action="" method="post">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Nombre Servicio</label>
                                                <input class="form-control" type="text" id="nombreServicio" name="nombreServicio">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Especialidad</label>
                                                <select class="form-control" name="especialidad" id="especialidad">
                                                    <option value="">[Seleccione especialidad...]</option>
                                                    @foreach($especialidad as $valorEspecialidad)
                                                        <option value="{{ $valorEspecialidad->id }}">{{ $valorEspecialidad->especialidad }}</option>
                                                    @endforeach;
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Duración</label>
                                                    <input class="form-control" type="text" id="duracion" name="duracion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Precio Particular</label>
                                                <input class="form-control" type="text" id="precio" name="precio">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion" name="descripcion" id="" cols="30" rows="10" resizable=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Preparación previa</label>
                                                    <textarea class="form-control" id="preparacionPrevia" name="preparacionPrevia" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="" id="idServicio">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" name="btnEditarServicio" id="btnEditarServicio" class="btn btn-primary waves-effect waves-light">Editar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <table id="datatableServicios" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Especialidad</th>
                            <th>Precio</th>
                            <th>Duración</th>
                            <th>Preparación previa</th>
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



