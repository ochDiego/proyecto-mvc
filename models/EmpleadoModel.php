<?php

    class EmpleadoModel
    {
        private $db;

        public function __construct()
        {
            $this->db = Database::conectar();
        }

        public function getEmpleados()
        {
            $sentencia=$this->db->query("CALL sp_select_empleados()");
            $response=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            return $response;
        }

        public function getEmpleado($id)
        {
            $sentencia=$this->db->prepare("CALL sp_select_empleado(?)");
            $sentencia->bindParam(1,$id);
            $sentencia->execute();
            $response=$sentencia->fetch(PDO::FETCH_ASSOC);

            return $response;
        }

        public function getPuestos()
        {
            $sentencia=$this->db->query("CALL sp_select_puestos()");
            $response=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            return $response;
        }

        public function getImagen($id)
        {
            $sentencia=$this->db->prepare("CAll sp_select_archivo(?)");
            $sentencia->bindParam(1,$id);
            $sentencia->execute();
            $response=$sentencia->fetch(PDO::FETCH_ASSOC);

            return $response;
        }

        public function insertEmpleado($nombre,$apellido,$imagen,$fechaIngreso,$email,$puesto_id)
        {
            $sentencia=$this->db->prepare("CALL sp_insert_empleado(?,?,?,?,?,?)");
            $sentencia->bindParam(1,$nombre);
            $sentencia->bindParam(2,$apellido);
            $sentencia->bindParam(3,$imagen);
            $sentencia->bindParam(4,$fechaIngreso);
            $sentencia->bindParam(5,$email);
            $sentencia->bindParam(6,$puesto_id);
            $sentencia->execute();

            $response=$sentencia->fetch(PDO::FETCH_ASSOC);

            return $response['response'];
        }

        public function updateEmpleado($id,$nombre,$apellido,$fechaIngreso,$email,$puesto_id)
        {
            $sentencia=$this->db->prepare("CALL sp_update_empleado(?,?,?,?,?,?)");
            $sentencia->bindParam(1,$id);
            $sentencia->bindParam(2,$nombre);
            $sentencia->bindParam(3,$apellido);
            $sentencia->bindParam(4,$fechaIngreso);
            $sentencia->bindParam(5,$email);
            $sentencia->bindParam(6,$puesto_id);
            $sentencia->execute();

            $response=$sentencia->fetch(PDO::FETCH_ASSOC);

            return $response['response'];
        }

        public function updateImagen($id,$imagen)
        {
            $sentencia=$this->db->prepare("CALL sp_update_imagen(?,?)");
            $sentencia->bindParam(1,$id);
            $sentencia->bindParam(2,$imagen);
            $sentencia->execute();
            
            $response=$sentencia->fetch(PDO::FETCH_ASSOC);
            
            return $response['response'];
        }

        public function deleteEmpleado($id)
        {
            $sentencia=$this->db->prepare("CALL sp_delete_empleado(?)");
            $sentencia->bindParam(1,$id);
            $sentencia->execute();

            $response=$sentencia->fetch(PDO::FETCH_ASSOC);

            return $response['response'];
        }
    } 