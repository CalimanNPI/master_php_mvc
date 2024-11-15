<?php

namespace Cdc\Gym\middleware;

use Cdc\Gym\lib\Session;

class CsrfTokenMiddleware
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }


    public function verifyCsrfToken()
    {
        if (isset($_POST["csrf"]) && !empty($this->session->get('csrf_token')) &&  $_POST["csrf"] === $this->session->get('csrf_token')) {
            return true;
        } else {
            return false;
        }
    }
}
