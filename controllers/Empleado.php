<?php
    session_start();

    class EmpleadoController
    {
        private $empleado;

        public function __construct()
        {
            require_once 'models/EmpleadoModel.php';
            $this->empleado = new EmpleadoModel;
        }

        public function index()
        {
            $data['empleados']=$this->empleado->getEmpleados();
            $data['titulo']="Lista de empleados";

            require_once 'views/empleados/empleados.php';
        }

        public function create()
        {
            $data['puestos']=$this->empleado->getPuestos();
            $data['titulo']="Crear registro";

            require_once 'views/empleados/create.php';
        }

        public function store()
        {
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $imagen=$_FILES['imagen']['name'];
            $puesto_id=$_POST['puesto_id'];
            $fechaIngreso=$_POST['fechaIngreso'];
            $email=$_POST['email'];

            if(empty($nombre) || empty($apellido) || empty($imagen) || empty($puesto_id) || empty($fechaIngreso) || empty($email)){
                $_SESSION['msj']="Error: Todos los campos son requeridos";
                $_SESSION['msj_type']="danger";

                header("location:index.php?c=Empleado&m=create");
            }else{
                $fecha=new DateTime;
                $archivoImagen=($imagen!="")?$fecha->getTimestamp()."_".$imagen:"imagen.jpg";
                $tmpImagen=$_FILES['imagen']['tmp_name'];

                if($tmpImagen!=""){
                    move_uploaded_file($tmpImagen,"assets/images/".$archivoImagen);
                }


                $insertEmpleado=$this->empleado->insertEmpleado($nombre,$apellido,$archivoImagen,$fechaIngreso,$email,$puesto_id);

                if($insertEmpleado){
                    $_SESSION['msj']="Empleado registrado";

                    header("location:index.php");
                }else{
                    $_SESSION['msj']="Error: El email ingresado ya existe, ingrese otro por favor";
                    $_SESSION['msj_type']="danger";

                    header("location:index.php?c=Empleado&m=create");
                }
            }
        }

        public function edit($id)
        {
            $data['id']=$id;
            $data['empleado']=$this->empleado->getEmpleado($id);
            $data['puestos']=$this->empleado->getPuestos();
            $data['titulo']="Actualizar registro";

            require_once 'views/empleados/edit.php';
        }

        public function update()
        {
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $puesto_id=$_POST['puesto_id'];
            $fechaIngreso=$_POST['fechaIngreso'];
            $email=$_POST['email'];

            $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";

            if(empty($nombre) || empty($apellido) || empty($puesto_id) || empty($fechaIngreso) || empty($email)){
                $_SESSION['msj']="Error: Todos los campos son requeridos";
                $_SESSION['msj_type']="danger";

                header("location:index.php?c=Empleado&m=edit&id=$id");
            }else{
                $updateEmpleado=$this->empleado->updateEmpleado($id,$nombre,$apellido,$fechaIngreso,$email,$puesto_id);

                if($updateEmpleado){
                    $_SESSION['msj']="Empleado actualizado";

                    header("location:index.php");
                }else{
                    $_SESSION['msj']="Error: El email ingresado ya existe, ingrese otro por favor";
                    $_SESSION['msj_type']="danger";

                    header("location:index.php?c=Empleado&m=edit&id=$id");
                }

                if($imagen!=""){
                    $fecha=new DateTime;
                    $archivoImagen=($imagen!="")?$fecha->getTimestamp()."_".$imagen:"imagen.jpg";
                    $tmpImagen=$_FILES['imagen']['tmp_name'];
                    move_uploaded_file($tmpImagen,"assets/images/".$archivoImagen);

                    $archivo=$this->empleado->getImagen($id);

                    if(isset($archivo['imagen']) && $archivo['imagen']!="imagen.jpg"){
                        if(file_exists("assets/images/".$archivo['imagen'])){
                            unlink("assets/images/".$archivo['imagen']);
                        }
                    }

                    $updateImagen=$this->empleado->updateImagen($id,$archivoImagen);

                    if($updateImagen){
                        $_SESSION['msj']="Empleado actualizado";
    
                        header("location:index.php");
                    }
                }
            }
        }

        public function destroy($id)
        {
            $deleteEmpleado=$this->empleado->deleteEmpleado($id);

            if($deleteEmpleado){
                $_SESSION['msj']="Empleado eliminado";

                header("location:index.php");
            }else{
                header("location:index.php");
            }
        }
    }