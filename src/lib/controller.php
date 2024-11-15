<?php

namespace Web\Gym\lib;

class Controller
{
    /**
     *  Valiable se le asignara la instancia del modelo a utilizar
     */
    public $model;
    public $fields;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    /**
     * Carga el modelo
     */
    public function loadModel($model)
    {
        $modelName = $model . 'Model'; // Concatena nombre del modelo
        $class = 'Cdc\\Gym\\model\\' . $modelName; // concatena el namespace con el nombre del modelo
        $this->model = new $class(); // Crea una instancia del modelo y se asigna a la variable molde
    }

    public function setFields()
    {
        $this->fields = json_decode(trim(file_get_contents("php://input")));
    }

    public function response($content)
    {
        $code = $content ? 200 : 204;
        error_log(json_encode(["response" => $content, "code" => $code]));
    }
}
