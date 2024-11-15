<?php

namespace Web\Gym\routes;

class BackendRoutes
{

    function __construct() {}

    public function loadRoutes($router)
    {
        // Rutas para el panel de administración
        $router->get('/', function () {
            echo json_encode(['code' => 200]);
        });

        // $router->get('/evento', "OpenpayController@edtitPrecio");
        //
        // $router->mount('/home', function () use ($router) {
        //     $router->get('/', "UserController@index");
        // });
    }
}
