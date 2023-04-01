<?php

    function cargarControlador($controller)
    {
        $controlador = strtolower($controller);
        $nombreControlador = ucwords($controlador) . 'Controller';
        $archivoControlador = 'controllers/' . ucwords($controlador) . '.php';

        if(!file_exists($archivoControlador))
        {
            $archivoControlador = 'controllers/' . CONTROLADOR_PRINCIPAL . '.php';
        }

        if(!class_exists($nombreControlador))
        {
            $nombreControlador = CONTROLADOR_PRINCIPAL . 'Controller';
        }

        require_once $archivoControlador;
        $control = new $nombreControlador;

        return $control;
    }
    

    function cargarMetodo($controlador,$metodo,$id=null,$token=null)
    {
        if(isset($metodo) && method_exists($controlador,$metodo)){
            if($id == null){
                $controlador->$metodo();
            }else{
                if($token == null){
                    $controlador->$metodo($id);
                }else{
                    $controlador->$metodo($id,$token);
                }
            }
        }else{
            $controlador->{METODO_PRINCIPAL}();
        }
    }