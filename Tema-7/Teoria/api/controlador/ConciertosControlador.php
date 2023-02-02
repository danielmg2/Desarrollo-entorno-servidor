<?php

class ConciertosControlador extends controladorPadre
{

    public function controlador()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];

        switch ($metodo) {
            case 'GET':
                $this->buscar();
                break;
            case 'POST':
                $this->insertar();
                break;
            case 'PUT':
                $this->modificar();
                break;
            case 'DELETE':
                $this->borrar();
                break;
            default:
                ControladorPadre::respuesta('', array('HTTP/1.1 404 No se ha indicado el recurso'));
        }
    }


    public function buscar()
    {
        $parametros = $this->parametros();
        $recurso = self::recurso();
        if (count($recurso) == 2) {
            if (!$parametros) {
                //listar
                $lista = ConciertoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                if ((isset($_GET['fecha'])) && (isset($_GET['ordenF']))) {
                    $concierto = conciertoDAO::findByFechaOrder($_GET['fecha'], $_GET['ordenF']);
                    $data = json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else if (isset($_GET['fecha'])) {
                    $concierto = ConciertoDAO::findByFecha($_GET['fecha']);
                    $data = json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else if (isset($_GET['ordenF'])) {
                    if (($_GET['ordenF'] != 'ASC' && ($_GET['ordenF'] != 'DESC'))) {
                        self::respuesta('', array('HTTP/1.1 400 El filtro debe de ser ASC o DESC'));
                    }
                    $concierto = ConciertoDAO::findOrderByFecha($_GET['ordenF']);
                    $data = json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );

                    self::respuesta('', array('HTTP/1.1 404 No se ha utilizado un filtro correcto'));
                }
            }
        } else if (count(self::recurso()) == 3) {
            $concierto = ConciertoDAO::findById($recurso[2]);
            $data = json_encode($concierto);
            self::respuesta(
                $data,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
    }
    public function insertar()
    {
        $body = file_get_contents('php://input');
        $dato = json_decode($body);
        // $array = get_object_vars($dato);
        if (isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])) {
            $concierto = new Concierto($dato['grupo'], $dato['fecha'], $dato['precio'], $dato['lugar']);
        }
        if (ConciertoDAO::insert($concierto)) {
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        print_r($dato);
    }
    public function modificar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body);
            if (isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])) {
                $concierto = new Concierto($dato['grupo'], $dato['fecha'], $dato['precio'], $dato['lugar']);
                $concierto->id = $recurso[2];
                if (ConciertoDAO::update($concierto)) {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }
            }
        } else {
            self::respuesta('', array('HTTP/1.1 404 El recurso esta mal formado'));
        }
    }
    
    
    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {

            if (ConciertoDAO::update($recurso[2])) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            }
        }
        else {
            self::respuesta('', array('HTTP/1.1 404 El recurso esta mal formado'));
        }
    }





}
