<?php

namespace Web\Gym\lib;

class View
{

    public array $data;
    
    function __construct()
    {
    }

    public function render($nombre, $data)
    {
        $this->data = $data;
        require __DIR__ . "/../views/" . $nombre . ".php";
    }
}
