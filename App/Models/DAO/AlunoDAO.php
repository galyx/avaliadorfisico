<?php

namespace App\Models\DAO;

use App\Models\Entidades\Aluno;

class AlunoDAO extends BaseDAO
{
    public function verificaCodigoAluno($codigo_aluno)
    {
        try {

            $query = $this->select(
                "SELECT * FROM dados_aluno WHERE codigo_aluno = '$codigo_aluno' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaCpfAluno($cpf_aluno)
    {
        try {

            $query = $this->select(
                "SELECT * FROM dados_aluno WHERE cpf_aluno = '$cpf_aluno' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function salvarAluno(Aluno $aluno)
    {
        try {
            $codigo_aluno             = $aluno->getCodigoAluno();
            $cpf_aluno                = $aluno->getCpfAluno();
            $nome_aluno               = $aluno->getNomeAluno();
            $email_aluno              = $aluno->getEmailAluno();
            $data_nascimento          = $aluno->getDataNascimento();
            $datacadastro             = $aluno->getDataCadastro();
            // Inserindo dados novos de alunos no banco e retornando para confirmar
            return $this->insert(
                'dados_aluno',
                ":codigo_aluno,:cpf_aluno,:nome_aluno,:email_aluno,:data_nascimento,:data_cadastro",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':cpf_aluno'=>$cpf_aluno,
                    ':nome_aluno'=>$nome_aluno,
                    ':email_aluno'=>$email_aluno,
                    ':data_nascimento'=>$data_nascimento,
                    ':data_cadastro'=>$datacadastro
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function buscaComPaginacao($buscarAluno, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        $whereBusca = " WHERE nome_aluno 
                                LIKE '%$buscarAluno%' OR 
                                codigo_aluno = '$buscarAluno'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM dados_aluno $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM dados_aluno as dados_aluno $whereBusca LIMIT $inicio,$totalPorPagina"
        );
        
        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Aluno::class)];

    }

    public function dadosAluno($codigo_aluno)
    {
        $resultado = $this->select(
            "SELECT * FROM dados_aluno WHERE codigo_aluno = '$codigo_aluno'"
        );

        $numero_ficha = $this->select(
            "SELECT COUNT(numero_ficha) as ficha FROM dados_ficha WHERE codigo_aluno = '$codigo_aluno'"
        );

        $data_nascimento = $this->select(
            "SELECT data_nascimento FROM dados_aluno WHERE codigo_aluno = '$codigo_aluno'"
        );
        
        $dmy = explode("-",$data_nascimento->fetch()['data_nascimento']);
        $d = $dmy[2];
        $m = $dmy[1];
        $y = $dmy[0];

        $da = date("d");
        $ma = date("m");
        $ya = date("Y");

        $id = $ya - $y;
        if($ma < $m || $ma == $m && $da < $d){
            $id--;
        }
        
        return [
            'aluno'=>$resultado->fetchAll(\PDO::FETCH_CLASS, Aluno::class),
            'ficha'=>$numero_ficha->fetch()['ficha'],
            'nascimento'=>$id
        ];
    }
}
