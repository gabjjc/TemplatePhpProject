<?php

class usuario_model
{
    private $db;

    public function __construct()
    {
        $this->db = DB::connexion();
    }

    public function get_user($id_usuario)
    {

    }

    public function login($email, $password){

        $response = array();
        $sql = "select * from usuarios_control where email = '" . $email . "'";

        if (!$result = $this->db->query($sql)) {
            $response['error'] = "¡Oh, no! La consulta falló. ";
            return $response;
        }

        if ($result->num_rows === 0) {
            $response['error'] = "Usuario inexistente";
            return $response;
        }

        $user = $result->fetch_assoc();

        $validation = preg_match('/^[a-f0-9]{32}$/', $user['password']) ?
            md5($password) === $user['password'] :
            password_verify($password, $user['password']);

        if(!$validation){
            $response['error'] = "Usuario y/o contraseña incorrecta";

        }else{
            $response = $user;
        }

        return $response;
    }


}