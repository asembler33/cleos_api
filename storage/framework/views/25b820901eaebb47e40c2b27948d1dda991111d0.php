<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Basic_Elements'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Forms
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Agregar Sucursal
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

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
                                    <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comuna->comuna_id); ?>"><?php echo e($comuna->comuna_nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\wamp64\www\cleos_laravel\resources\views/sucursales/crear-sucursal.blade.php ENDPATH**/ ?>