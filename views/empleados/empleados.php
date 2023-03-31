<?php include_once 'views/templates/header.php'; ?>

        <?php if(isset($_SESSION['msj'])): ?>

            <script>
                Swal.fire({
                    title: '<?= $_SESSION['msj']; ?>',
                    icon: 'success'
                })
            </script>

        <?php session_unset(); endif ?>

        <h1 class="text-center"><?= $data['titulo']; ?></h1>

        <a name="" id="" class="btn btn-primary" href="index.php?c=Empleado&m=create" role="button">Nuevo registro</a>

        <div class="row mt-3">
            <div class="col-12">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Imagen</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Fecha de ingreso</th>
                                <th class="text-center" scope="col">Puesto</th>
                                <th class="text-center" scope="col">Fecha de creación</th>
                                <th class="text-center" scope="col">Fecha de actualización</th>
                                <th class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($data['empleados']) > 0){ ?>
                                <?php foreach($data['empleados'] as $empleado): ?>
                                    <tr class="">
                                        <td class="text-center" scope="row"><?= $empleado['nombre']; ?></td>
                                        <td class="text-center">
                                            <a href="assets/images/<?= $empleado['imagen']; ?>" target="__BLANK">
                                                <img src="assets/images/<?= $empleado['imagen']; ?>" width="30" class="img-thumbnail rounded" alt="">
                                            </a>
                                        </td>
                                        <td class="text-center"><?= $empleado['email']; ?></td>
                                        <td class="text-center"><?= $empleado['fecha_ingreso']; ?></td>
                                        <td class="text-center"><?= $empleado['puesto']; ?></td>
                                        <td class="text-center"><?= $empleado['fecha_creacion']; ?></td>
                                        <td class="text-center"><?= $empleado['fecha_actualizacion']; ?></td>
                                        <td class="text-center">
                                            <a name="" id="" class="btn btn-info btn-sm" href="index.php?c=Empleado&m=edit&id=<?= $empleado['id']; ?>" role="button">Edit</a>

                                            <!-- Button trigger modal -->
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $empleado['id']; ?>">Delete</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $empleado['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este registro?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Una vez eliminado no se podrá recuperar el registro...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    
                                                    <a name="" id="" class="btn btn-danger" href="index.php?c=Empleado&m=destroy&id=<?= $empleado['id']; ?>" role="button">Delete</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php }else{ ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        No hay datos actualmente
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

<?php include_once 'views/templates/footer.php'; ?>