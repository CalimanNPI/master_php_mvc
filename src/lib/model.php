<?php

namespace Web\Gym\lib;

use Web\Gym\lib\Database;

class Model
{
    //  variable a la cual se le asignara la instancia de la base de datos
    public $db;

    /**
     *  Inicializa la variable creando un nuevo objeto de Database() 
     */
    public function __construct()
    {
        $this->db = new Database();
    }
}
