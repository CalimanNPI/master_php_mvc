<?php

namespace Web\Gym\controller;

use Web\Gym\lib\Controller;
use Exception;

class GymController extends Controller
{
    protected string $uuid;
    public $filesType = ['jpg', 'png', 'jpeg', 'gif', 'avi', 'mp4'];


    // Constructor de la clase
    function __construct()
    {
        // Hace referencia al nombre de la clase base Model pra hacer uso de sus métodos
        parent::__construct();
        // $this->loadModel("Gym");
        // $this->setFields();
    }
    
    public function erro_404(){
        echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
    }

    /**
     * Ejercicios
     */
    function indexEjercicios()
    {
        try {
            $this->response($this->model->getEjercicios());
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }
}
