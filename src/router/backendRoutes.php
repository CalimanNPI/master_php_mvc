<?php

namespace Cdc\Gym\routes;

class BackendRoutes
{

    function __construct()
    {
    }

    public function loadRoutes($router)
    {
        // Rutas para el panel de administración
        $router->post('/evento', "OpenpayController@post_evento");
        $router->get('/evento', "OpenpayController@edtitPrecio");

        $router->mount('/home', function () use ($router) {
            $router->get('/', "UserController@index");
        });
    }
}
