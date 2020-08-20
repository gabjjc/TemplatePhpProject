<?php

class usuario_controller
{
    public function login()
    {
        require_once("../models/usuario_model.php");
        $usuario = new usuario_model();

        $user = $usuario->login($_REQUEST["email"], $_REQUEST["password"]);

        if (isset($user['error'])) {
            $message = $user['error'];
        } else {
            $token = $this->generateToken($user);
            header('Location: ../views/index.php?jwt='.$token);
        }

    }

    private function generateToken($user)
    {
        require_once '../config/config.php';
        require_once("../middleware/JWT.php");

        $token = array(
            "iss" => $conf_serverName,      // Issuer
            "iat" => time(),             // Issued at: time when the token was generated
            'exp' => time() + 10800,     // Adding 15 minutes,
            'data' => [                     // Data related to the signer user
                'id_usuario' => $user['id'],
                'nombre' => $user['nombre'],
                'apellido' => $user['apellido'],
                'email' => $user['email'],
                'usuario' => $user['usuario']
            ]
        );
        return JWT::encode($token, $conf_key);
    }

}

