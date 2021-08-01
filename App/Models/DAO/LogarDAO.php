<?php

namespace App\Models\DAO;

use App\Lib\Sessao;
use App\Models\Entidades\Usuario;

class LogarDAO extends BaseDAO
{
    public function loginEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM login WHERE email != '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function loginSenha($email, $senha)
    {
        try {

            $query = $this->select(
                "SELECT * FROM login WHERE email = '$email' LIMIT 1 "
            );
            $senhas = $query->fetch();

            if(password_verify($senha, $senhas[5])){
                return false;
            }else{
                return true;
            }

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function logar(Usuario $logar)
    {
        try {
            $email  = $logar->getEmail();
            
            $query  = $this->select("SELECT * FROM login WHERE email = '$email' ");
            $dados  = $query->fetch();

            $dadoslogin = array(
                'login' => 'true',
                'id'    => $dados[0],
                'cpf'   => $dados[2],
                'email' => $dados[4]
            );
            Sessao::gravaDadosLogin($dadoslogin);

            // Registro de logins
            date_default_timezone_set('America/Sao_Paulo');
            setlocale(LC_ALL, 'pt_BR');
            $ip = $_SERVER['REMOTE_ADDR'];
            $data = date("Y-m-d H:s:i");
            $this->insert(
                'logs',
                ":email,:endereco_ip,:data_login",
                [
                    ':email'=>$dados[4],
                    ':endereco_ip'=>$ip,
                    ':data_login'=>$data
                ]
            );
            return $dadoslogin;

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}