<?php

namespace App\Lib;

class Sessao
{
    public static function gravaMensagem($mensagem){
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function limpaMensagem(){
        unset($_SESSION['mensagem']);
    }

    public static function retornaMensagem(){
        return ($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    }

    public static function gravaFormulario($form){
        $_SESSION['form'] = $form;
    }

    public static function limpaFormulario(){
        unset($_SESSION['form']);
    }

    public static function retornaValorFormulario($key){
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }

    public static function existeFormulario(){
        return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
    }

    public static function gravaDadosLogin($dadoslogin){
        $_SESSION['dadoslogin'] = $dadoslogin;
    }

    public static function limpaDadosLogin(){
        unset($_SESSION['dadoslogin']);
    }

    public static function DadosLogin($key){
        return (isset($_SESSION['dadoslogin'][$key])) ? $_SESSION['dadoslogin'][$key] : "";
    }

    public static function existeDadosLogin(){
        return (isset($_SESSION['dadoslogin'])) ? $_SESSION['dadoslogin'] : "";
    }
}