<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Lib\Resultado;

use App\Models\DAO\AlunoDAO;
use App\Models\DAO\FichaDAO;
use App\Models\DAO\LogarDAO;
use App\Models\DAO\EnviarmailDAO;

use App\Models\Entidades\Aluno;
use App\Models\Entidades\Ficha;

class AlunoController extends Controller
{
    public function novoAluno()
    {
        $this->render('/aluno/novoaluno');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvarAluno()
    {
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_ALL, 'pt_BR');

        $datacadastro = date("Y-m-d H:i:s");
        $data_nascimento = str_replace("/","-", $_POST['datanascimento']);

        $valor = rand(3, 3);
        $codon = substr(str_shuffle("ABCDEFGHIJKLMNPQRSTUVYXWZ"), 0, $valor);
        $codtwo = substr(str_shuffle("ABCDEFGHIJKLMNPQRSTUVYXWZ"), 0, $valor);

        $d_c = $_POST['datanascimento'];
        $codigo_aluno = $d_c[0].$d_c[1].$codon.$d_c[3].$d_c[4].$codtwo.$d_c[8].$d_c[9];

        $Aluno = new Aluno();
        $Aluno->setCodigoAluno($codigo_aluno);

        if($_POST['cpfaluno'] == ""){
            $Aluno->setCpfAluno(NULL);
        }else{
            $Aluno->setCpfAluno($_POST['cpfaluno']);
        }

        $Aluno->setNomeAluno($_POST['nomealuno']);
        $Aluno->setEmailAluno($_POST['emailaluno']);
        $Aluno->setDataNascimento(date("Y-m-d", strtotime($data_nascimento)));
        $Aluno->setDataCadastro($datacadastro);

        Sessao::gravaFormulario($_POST);

        $alunoDAO = new AlunoDAO();
        if($alunoDAO->verificaCodigoAluno($codigo_aluno)){
            Sessao::gravaMensagem("Codigo ja cadastrado!");
            $this->redirect('/aluno/novoaluno');
        }
        if($alunoDAO->verificaCpfAluno($_POST['cpfaluno'])){
            Sessao::gravaMensagem("CPF ja cadastrado!");
            $this->redirect('/aluno/novoaluno');
        }

        if($alunoDAO->salvarAluno($Aluno)){
            Sessao::gravaMensagem("Aluno salvo!");
            Sessao::limpaFormulario();
            $this->redirect('/aluno/novoaluno');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    // --------
    public function selecionarAluno($params)
    {
        $alunoDAO = new AlunoDAO();

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = isset($_GET['totalPorPagina']) ? $_GET['totalPorPagina'] : 5;

        if(isset($_GET['buscarAluno']) ? " " : " "){

            $listaAlunos      = $alunoDAO->buscaComPaginacao($_GET['buscarAluno'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaAlunos);
            
            self::setViewParam('buscarAluno', $_GET['buscarAluno']);
            self::setViewParam('paginacao', $paginacao->criarLink($_GET['buscarAluno']));
            self::setViewParam('listaAlunos'  , $listaAlunos['resultado']);
        }

        self::setViewParam('totalPorPagina', $totalPorPagina);

        $this->render('/aluno/selecionaraluno');

        Sessao::limpaMensagem();
    }

    public function totalPorPagina()
    {

        if(isset($_POST['totalPorPagina'])){
            $_SESSION['totalPorPagina'] = $_POST['totalPorPagina'];
        } else {
            $_SESSION['totalPorPagina'] = 5;
        }

        exit;
    }
    // --------
    public function novaFicha()
    {
        $codigo_aluno = $_GET['codigoAluno'];

        $AlunoDAO = new AlunoDAO();

        self::setViewParam('numeroFicha', $AlunoDAO->dadosAluno($codigo_aluno)['ficha']);
        self::setViewParam('dadosAluno', $AlunoDAO->dadosAluno($codigo_aluno)['aluno']);
        self::setViewParam('idade', $AlunoDAO->dadosAluno($codigo_aluno)['nascimento']);

        $this->render('/aluno/novaficha');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvarficha()
    {
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_ALL, 'pt_BR');

        $Ficha = new Ficha();
        $Ficha->setCodigoAluno($_POST['codigoaluno']);

        $Ficha->setNumeroFicha($_POST['numeroficha']);
        $Ficha->setDataFicha(date("Y-m-d", strtotime(str_replace("/","-",$_POST['dataficha']))));
        $Ficha->setObjetivo($_POST['objetivo']);
        $Ficha->setObservacao($_POST['observacao']);
        $Ficha->setAltura($_POST['altura']);
        $Ficha->setIdade($_POST['idade']);
        $Ficha->setPeso($_POST['peso']);
        $Ficha->setSexo($_POST['sexo']);

        $Ficha->setPescoco($_POST['pescoco']);
        $Ficha->setDeltoides($_POST['deltoides']);
        $Ficha->setTorax($_POST['torax']);
        $Ficha->setAbdomeC($_POST['abdomeC']);
        $Ficha->setAbdomeM($_POST['abdomeM']);
        $Ficha->setQuadril($_POST['quadril']);

        $Ficha->setBracoCD($_POST['bracoCD']);
        $Ficha->setBracoCE($_POST['bracoCE']);
        $Ficha->setBracoRD($_POST['bracoRD']);
        $Ficha->setBracoRE($_POST['bracoRE']);
        $Ficha->setAntebracoD($_POST['antebracoD']);
        $Ficha->setAntebracoE($_POST['antebracoE']);
        $Ficha->setCoxaPD($_POST['coxaPD']);
        $Ficha->setCoxaPE($_POST['coxaPE']);
        $Ficha->setCoxaMD($_POST['coxaMD']);
        $Ficha->setCoxaME($_POST['coxaME']);
        $Ficha->setPanturrilhaD($_POST['panturrilhaD']);
        $Ficha->setPanturrilhaE($_POST['panturrilhaE']);

        if($_POST['check_protocolo'] == true){
            $Ficha->setProtocoloDC($_POST['protocoloDC']);

            $Ficha->setBicipitalD1($_POST['bicipitalD1']);
            $Ficha->setBicipitalD2($_POST['bicipitalD2']);
            $Ficha->setMediaBD($_POST['mediaBD']);
            $Ficha->setBicipitalEU($_POST['bicipitalEU']);

            $Ficha->setTricipitalD1($_POST['tricipitalD1']);
            $Ficha->setTricipitalD2($_POST['tricipitalD2']);
            $Ficha->setMediaTD($_POST['mediaTD']);
            $Ficha->setTricipitalEU($_POST['tricipitalEU']);

            $Ficha->setToracicaD1($_POST['toracicaD1']);
            $Ficha->setToracicaD2($_POST['toracicaD2']);
            $Ficha->setMediaT_D($_POST['mediaT_D']);
            $Ficha->setToracicaEU($_POST['toracicaEU']);

            $Ficha->setSubescapularD1($_POST['subescapularD1']);
            $Ficha->setSubescapularD2($_POST['subescapularD2']);
            $Ficha->setMediaSD($_POST['mediaSD']);
            $Ficha->setSubescapularEU($_POST['subescapularEU']);

            $Ficha->setAxiliarMediaD1($_POST['axiliarmediaD1']);
            $Ficha->setAxiliarMediaD2($_POST['axiliarmediaD2']);
            $Ficha->setMediaAMD($_POST['mediaAMD']);
            $Ficha->setAxiliarMediaEU($_POST['axiliarmediaEU']);

            $Ficha->setSupraIliacaD1($_POST['suprailiacaD1']);
            $Ficha->setSupraIliacaD2($_POST['suprailiacaD2']);
            $Ficha->setMediaSID($_POST['mediaSID']);
            $Ficha->setSupraIliacaEU($_POST['suprailiacaEU']);

            $Ficha->setAbdominalD1($_POST['abdominalD1']);
            $Ficha->setAbdominalD2($_POST['abdominalD2']);
            $Ficha->setMediaAD($_POST['mediaAD']);
            $Ficha->setAbdominalEU($_POST['abdominalEU']);

            $Ficha->setCoxaD1($_POST['coxaD1']);
            $Ficha->setCoxaD2($_POST['coxaD2']);
            $Ficha->setMediaCD($_POST['mediaCD']);
            $Ficha->setCoxaEU($_POST['coxaEU']);

            $Ficha->setPanturrilhaMedialD1($_POST['panturrilhamedialD1']);
            $Ficha->setPanturrilhaMedialD2($_POST['panturrilhamedialD2']);
            $Ficha->setMediaPMD($_POST['mediaPMD']);
            $Ficha->setPanturrilhaMedialEU($_POST['panturrilhamedialEU']);
        }else{
            $Ficha->setProtocoloDC(NULL);

            $Ficha->setBicipitalD1(NULL);
            $Ficha->setBicipitalD2(NULL);
            $Ficha->setMediaBD(NULL);
            $Ficha->setBicipitalEU(NULL);

            $Ficha->setTricipitalD1(NULL);
            $Ficha->setTricipitalD2(NULL);
            $Ficha->setMediaTD(NULL);
            $Ficha->setTricipitalEU(NULL);

            $Ficha->setToracicaD1(NULL);
            $Ficha->setToracicaD2(NULL);
            $Ficha->setMediaT_D(NULL);
            $Ficha->setToracicaEU(NULL);

            $Ficha->setSubescapularD1(NULL);
            $Ficha->setSubescapularD2(NULL);
            $Ficha->setMediaSD(NULL);
            $Ficha->setSubescapularEU(NULL);

            $Ficha->setAxiliarMediaD1(NULL);
            $Ficha->setAxiliarMediaD2(NULL);
            $Ficha->setMediaAMD(NULL);
            $Ficha->setAxiliarMediaEU(NULL);

            $Ficha->setSupraIliacaD1(NULL);
            $Ficha->setSupraIliacaD2(NULL);
            $Ficha->setMediaSID(NULL);
            $Ficha->setSupraIliacaEU(NULL);

            $Ficha->setAbdominalD1(NULL);
            $Ficha->setAbdominalD2(NULL);
            $Ficha->setMediaAD(NULL);
            $Ficha->setAbdominalEU(NULL);

            $Ficha->setCoxaD1(NULL);
            $Ficha->setCoxaD2(NULL);
            $Ficha->setMediaCD(NULL);
            $Ficha->setCoxaEU(NULL);

            $Ficha->setPanturrilhaMedialD1(NULL);
            $Ficha->setPanturrilhaMedialD2(NULL);
            $Ficha->setMediaPMD(NULL);
            $Ficha->setPanturrilhaMedialEU(NULL);
        }
                
        if($_POST['abdomencheck'] == false){
            $Ficha->setAbdomen(NULL);
            $Ficha->setAbdomenCheck(NULL);
        }else{
            $Ficha->setAbdomen($_POST['abdomen']);
            $Ficha->setAbdomenCheck("TRUE");
        }
        if($_POST['flexaocheck'] == false){
            $Ficha->setFlexao(NULL);
            $Ficha->setFlexaoCheck(NULL); 
        }else{
            $Ficha->setFlexao($_POST['flexao']);
            $Ficha->setFlexaoCheck("TRUE");  
        }

        if($_POST['check_bioimpedancia'] == true){
            $Ficha->setGorduraCorporal($_POST['gorduracorporal']);
            $Ficha->setMassaMuscular($_POST['massamuscular']);
            $Ficha->setAgua($_POST['agua']);
            $Ficha->setProteina($_POST['proteina']);
            $Ficha->setGorduraVisceral($_POST['gorduravisceral']);
            $Ficha->setMassaOsseaP($_POST['massaossea_p']);
            $Ficha->setMassaOsseaKG($_POST['massaossea_kg']);
            $Ficha->setIdadeCorporal($_POST['idadecorporal']);
            $Ficha->setTaxaMetabolismo($_POST['taxametabolismo']);
        }else{
            $Ficha->setGorduraCorporal(NULL);
            $Ficha->setMassaMuscular(NULL);
            $Ficha->setAgua(NULL);
            $Ficha->setProteina(NULL);
            $Ficha->setGorduraVisceral(NULL);
            $Ficha->setMassaOsseaP(NULL);
            $Ficha->setMassaOsseaKG(NULL);
            $Ficha->setIdadeCorporal(NULL);
            $Ficha->setTaxaMetabolismo(NULL);
        }

        $FichaDAO = new FichaDAO();

        if($FichaDAO->salvarFicha($Ficha)){
            $this->redirect('/aluno/selecionarficha?codigoAluno='.$_POST['codigoaluno'].'&numeroFicha='.$_POST['numeroficha']);
        }
    }

    public function selecionarFicha(){
        $codigoAluno = $_GET['codigoAluno'];
        $numeroFicha = isset($_GET['numeroFicha']) ? $_GET['numeroFicha'] : 1;

        $AlunoDAO = new AlunoDAO();
        $FichaDAO = new FichaDAO();

        $DadosFicha = $FichaDAO->dadosFicha($codigoAluno,$numeroFicha);

        if(!$DadosFicha['ficha']){
            Sessao::gravaMensagem("Nenhuma Ficha foi cadastrada para o Aluno Codigo ".$codigoAluno);
            $this->redirect('/aluno/selecionaraluno');
        }

        self::setViewParam('dados_aluno',$AlunoDAO->dadosAluno($codigoAluno)['aluno']);
        self::setViewParam('ficha',$DadosFicha['ficha']);
        self::setViewParam('dadosFicha',$DadosFicha['dadosFicha']);
        self::setViewParam('perimetria',$DadosFicha['perimetria']);
        self::setViewParam('direita_esquerda',$DadosFicha['direita_esquerda']);
        self::setViewParam('protocolo',$DadosFicha['protocolo']);
        self::setViewParam('bicipital',$DadosFicha['bicipital']);
        self::setViewParam('tricipital',$DadosFicha['tricipital']);
        self::setViewParam('toracica',$DadosFicha['toracica']);
        self::setViewParam('subescapular',$DadosFicha['subescapular']);
        self::setViewParam('axiliar_media',$DadosFicha['axiliar_media']);
        self::setViewParam('supra_iliaca',$DadosFicha['supra_iliaca']);
        self::setViewParam('abdominal',$DadosFicha['abdominal']);
        self::setViewParam('coxa',$DadosFicha['coxa']);
        self::setViewParam('panturrilha_medial',$DadosFicha['panturrilha_medial']);
        self::setViewParam('bioimpedancia',$DadosFicha['bioimpedancia']);
        self::setViewParam('teste_resistencia_muscular',$DadosFicha['teste_resistencia_muscular']);

        $ResultadoModel = new Resultado();

        self::setViewParam('BioimpedanciaResultado',$ResultadoModel->BioimpedanciaModel($DadosFicha['bioimpedancia'],$DadosFicha['dadosFicha']));
        self::setViewParam('TesteResistenciaMuscularResultado',$ResultadoModel->TesteResistenciaMuscularModel($DadosFicha['teste_resistencia_muscular'],$DadosFicha['dadosFicha']));
        self::setViewParam('Resultado',$ResultadoModel->ResultadoModel(
            $DadosFicha['perimetria'],
            $DadosFicha['dadosFicha'],
            $DadosFicha['protocolo'],
            $DadosFicha['bicipital'],
            $DadosFicha['tricipital'],
            $DadosFicha['toracica'],
            $DadosFicha['subescapular'],
            $DadosFicha['axiliar_media'],
            $DadosFicha['supra_iliaca'],
            $DadosFicha['abdominal'],
            $DadosFicha['coxa'],
            $DadosFicha['panturrilha_medial']
        ));
        self::setViewParam('ChartCC',$ResultadoModel->ChartCCModel($DadosFicha['dadosFicha']));
        self::setViewParam('ChartGCDC',$ResultadoModel->ChartGCDCModel($DadosFicha['dadosFicha']));
        self::setViewParam('ChartGCB',$ResultadoModel->ChartGCBModel($DadosFicha['dadosFicha']));

        self::setViewParam('codigoAluno', $codigoAluno);
        self::setViewParam('numeroFicha', $numeroFicha);

        $this->render('/aluno/selecionarficha');
    }
}