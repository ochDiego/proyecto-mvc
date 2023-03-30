<?php include_once 'views/templates/header.php'; ?>

        <h1 class="text-center"></h1>

        <a name="" id="" class="btn btn-primary" href="#" role="button">Lista de empleados</a>

        <div class="row mt-3">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Datos del empleado
                    </div>
                    <div class="card-body">
                        <form class="row" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="nombre" class="form-label">Nombre:</label>
                                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" autofocus require>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="apellido" class="form-label">Apellido:</label>
                                  <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId" require>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="imagen" class="form-label">Imagen:</label>
                                  <input type="file" name="imagen" id="imagen" class="form-control" placeholder="" aria-describedby="helpId" require>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="puesto_id" class="form-label">Puestos:</label>
                                    <select class="form-select form-select-sm" name="puesto_id" id="puesto_id">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="fechaIngreso" class="form-label">Fecha de ingreso:</label>
                                  <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control" placeholder="" aria-describedby="helpId" require>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email:</label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" require>
                                </div>
                            </div>

                            <div class="col-6">
                                <button type="submit" class="btn btn-succes btn-block">Guardar</button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'views/templates/footer.php'; ?>