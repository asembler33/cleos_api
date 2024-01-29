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
@slot('title') Especialidades @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearEspecialidad">Agregar Especialidades</button>
                    </div>
                </div>
            </div>
            <div id="modalCrearEspecialidad" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Crear Especialidad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEspecialidades" action="" method="post">
                                <div class="mb-3">
                                    <label for="especialidad" class="col-form-label">Especialidad:</label>
                                    <input type="text" class="form-control" id="especialidad">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="" id="idEspecialidad">
                            <input type="hidden" name="" id="modo" value="">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" id="btnCrearEspecialidad" class="btn btn-primary waves-effect waves-light">Guardar</button>
                            <button type="button" id="btnEditarEspecialidad" class="btn btn-primary waves-effect waves-light">Editar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div class="card-body">
                <table id="datatableEspecialidades" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Especialidad</th>
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

