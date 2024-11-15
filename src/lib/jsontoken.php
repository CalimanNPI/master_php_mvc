<?php

namespace Web\Gym\lib;

class JsonToken
{

    function __construct()
    {
    }

    /** Crea JSON WEB TOKEN para el inicio de sesión */
    public static function createJWT($param)
    {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode($param);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        return $jwt;
    }

    public static function decodeJWT($token)
    {
        $array = explode('.', $token);
        $token = str_replace(['-', '_', ''], ['+', '/', '='], base64_decode($array[1]));
        return json_decode($token);
    }

    /** Crea un codigo unico de 4 digitos */
    public static function createCode()
    {
        return mt_rand(0, 9) . mt_rand(0, 9) . mt_rand(0, 9) . mt_rand(0, 9);
    }

    /**     
     * Valida si el token enviado por el cliente es igual al que se tiene registrado 
     * true = 0
     **/
    public static function is_token($clave, $token)
    {
        return strcmp(JsonToken::createJWT($clave), $token) == 0;
    }
}
