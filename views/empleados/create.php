<?php include_once 'views/templates/header.php'; ?>

        <h1 class="text-center"><?= $data['titulo']; ?></h1>

        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Lista de empleados</a>

        <div class="row mt-3">
            <div class="col-8 mx-auto">

                <?php if(isset($_SESSION['msj'])): ?>

                    <div class="alert alert-<?= $_SESSION['msj_type'] ?> alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                        <small><?= $_SESSION['msj']; ?></small>
                    </div>
                    
                
                <?php session_unset(); endif ?>

                <div class="card">
                    <div class="card-header">
                        Datos del empleado
                    </div>
                    <div class="card-body">
                        <form class="row" action="index.php?c=Empleado&m=store" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="nombre" class="form-label">Nombre:</label>
                                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" autofocus required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="apellido" class="form-label">Apellido:</label>
                                  <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="imagen" class="form-label">Imagen:</label>
                                  <input type="file" name="imagen" id="imagen" class="form-control" placeholder="" aria-describedby="helpId" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="puesto_id" class="form-label">Puestos:</label>
                                    <select class="form-select form-select-sm" name="puesto_id" id="puesto_id" required>
                                        <?php if(count($data['puestos']) > 0){ ?>
                                            <?php foreach($data['puestos'] as $puesto): ?>
                                                <option value="<?= $puesto['id']; ?>"><?= $puesto['nombre']; ?></option>
                                            <?php endforeach ?>
                                        <?php }else{ ?>
                                            <option value="">No hay puestos actualmente</option>  
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="fechaIngreso" class="form-label">Fecha de ingreso:</label>
                                  <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control" placeholder="" aria-describedby="helpId" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email:</label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'views/templates/footer.php'; ?>