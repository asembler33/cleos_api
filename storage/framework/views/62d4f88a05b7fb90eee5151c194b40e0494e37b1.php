<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Basic_Elements'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Forms <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Agregar Servicio <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php

    

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <form id="frmServicios" name="frmServicios" action="" method="post">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Nombre Servicio</label>
                                    <input class="form-control" type="text" id="nombreServicio" name="nombreServicio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="example-search-input" class="form-label">Especialidad</label>
                                <select class="form-control" name="especialidad" id="especialidad">
                                    <option value="">[Seleccione especialidad...]</option>
                                    <?php $__currentLoopData = $especialidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valorEspecialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($valorEspecialidad->id); ?>"><?php echo e($valorEspecialidad->especialidad); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
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
                    <div class="row justify-content-start">
                        <div class="col-md-2">
                            <!-- <div class="mb-3"> -->

                                <button type="submit" name="btnGuardarServicio" id="btnGuardarServicio" class="btn btn-primary">Guardar</button>
                                <button type="button" name="btnVolverServicio" id="btnVolverServicio" class="btn btn-danger">Volver</button>
                            <!-- </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\wamp64\www\cleos_laravel\resources\views/servicios/crear-servicio.blade.php ENDPATH**/ ?>