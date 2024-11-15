<?php

namespace Cdc\Gym\controller;

use Cdc\Gym\lib\Controller;
use Cdc\Gym\lib\UploadFile;
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
        $this->loadModel("Gym");
        $this->setFields();
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

    function showEjercicio($id)
    {
        try {
            $this->response($this->model->getEjercicioById([$id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function createEjercicio()
    {
        try {
            $this->response($this->model->saveEjercicio());
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function editEjercicio($id)
    {
        try {
            $ejercicio = $this->fields;
            error_log(json_encode($ejercicio));
            exit;

            $fileName = $ejercicio->musculo . $ejercicio->ejercicio;

            $target = "/sugerencias";
            // Crea instancia de la clase UploadFile
            $uploadFile  = UploadFile::uploads($target, $fileName, $this->filesType);

            $this->response($this->model->updateEjercicio([$ejercicio->musculo, $ejercicio->ejercicio, $ejercicio->descipcion, img, multimedia]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function deleteEjercicio($id)
    {
        try {
            $this->response($this->model->deleteEjercicio([$id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    /**
     * Rutinas
     */
    function indexRutinas()
    {
        try {
            $this->response($this->model->getRutinas());
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function showRutina($id)
    {
        try {
            $this->response($this->model->getRutinaById([$id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function createRutina()
    {
        try {
            $this->uuid = uniqid();
            $ejercicios = $this->fields->ejercicios;
            $content = [];

            foreach ($ejercicios as $ejercicio) {
                $content = [$ejercicio->id_ejercicio, $ejercicio->series, $ejercicio->repeticiones, $ejercicio->descanso, $ejercicio->dia, $ejercicio->prof_clave, date("Y-m-d"), $ejercicio->nom_rutina, $this->uuid, $ejercicio->peso];
                $this->model->saveRutina($content);
            }

            $this->response("Se agrego la rutina.");
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function editRutina($id)
    {
        try {
            $ejercicio = $this->fields;
            $content = [$ejercicio->id_ejercicio, $ejercicio->series, $ejercicio->repeticiones, $ejercicio->descanso, $ejercicio->dia, $ejercicio->prof_clave, $ejercicio->nom_rutina, $ejercicio->peso, $id];
            $this->response($this->model->updateRutina($content));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function deleteRutina($id)
    {
        try {
            $this->response($this->model->deleteRutina([$id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    /**
     * Asignacion
     */
    function indexAsignaciones()
    {
        try {
            $this->response($this->model->getAsignaciones());
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function showAsignacion($id)
    {
        try {
            $this->response($this->model->getAsignacionById([$id])());
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function createAsignacion($fields)
    {
        try {
            $this->response($this->model->saveAsignacion([$this->fields->codeRutina, $this->fields->duracion, $this->fields->clave_prof, $this->fields->clave_usu, $this->fields->fechaInicio, $this->fields->fechaFin]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function editAsignacion($id)
    {
        try {
            $this->response($this->model->updateAsignacion([$this->fields->codeRuotina, $this->fields->duracion, $this->fields->clave_prof, $this->fields->clave_usu, $this->fields->fechaInicio, $this->fields->fechaFin, $id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }

    function deleteAsignacion($id)
    {
        try {
            $this->response($this->model->deleteAsignacion([$id]));
        } catch (Exception $e) {
            error_log(__LINE__ . "    " . " gym " . "     " . $e->getMessage());
            echo json_encode(['err' => "Problemas al buscar los ejercicios.", "code" => 502]);
        }
    }
}
