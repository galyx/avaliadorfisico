<?php

namespace App\Models\Entidades;

class Aluno
{
    // Valores Privados de usuario
    private $id;
    private $codigo_aluno;
    private $cpf_aluno;
    private $nome_aluno;
    private $email_aluno;
    private $data_nascimento;
    private $datacadastro;

    // Dados de usuarios aleatorios
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodigoAluno()
    {
        return $this->codigo_aluno;
    }

    public function setCodigoAluno($codigo_aluno)
    {
        $this->codigo_aluno = $codigo_aluno;
    }

    public function getCpfAluno()
    {
        return $this->cpf_aluno;
    }

    public function setCpfAluno($cpf_aluno)
    {
        $this->cpf_aluno = $cpf_aluno;
    }

    public function getNomeAluno()
    {
        return $this->nome_aluno;
    }

    public function setNomeAluno($nome_aluno)
    {
        $this->nome_aluno = $nome_aluno;
    }

    public function getEmailAluno()
    {
        return $this->email_aluno;
    }

    public function setEmailAluno($email_aluno)
    {
        $this->email_aluno = $email_aluno;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($datacadastro)
    {
        $this->data_cadastro = $datacadastro;
    }

}