<?php

namespace App\Models\DAO;

use App\Models\Entidades\Aluno;
use App\Models\Entidades\Ficha;

class FichaDAO extends BaseDAO
{
    public function salvarFicha(Ficha $ficha)
    {
        try {
            $codigo_aluno             = $ficha->getCodigoAluno();
            $numero_ficha             = $ficha->getNumeroFicha();
            $data_ficha               = $ficha->getDataFicha();
            $objetivo                 = $ficha->getObjetivo();
            $observacao               = $ficha->getObservacao();
            $altura                   = $ficha->getAltura();
            $idade                    = $ficha->getIdade();
            $peso                     = $ficha->getPeso();
            $sexo                     = $ficha->getSexo();

            $pescoco                  = $ficha->getPescoco();
            $deltoides                = $ficha->getDeltoides();
            $torax                    = $ficha->getTorax();
            $abdome_c                 = $ficha->getAbdomeC();
            $abdome_m                 = $ficha->getAbdomeM();
            $quadril                  = $ficha->getQuadril();

            $bracoCD                  = $ficha->getBracoCD();
            $bracoCE                  = $ficha->getBracoCE();
            $bracoRD                  = $ficha->getBracoRD();
            $bracoRE                  = $ficha->getBracoRE();
            $antebracoD               = $ficha->getAntebracoD();
            $antebracoE               = $ficha->getAntebracoE();
            $coxaPD                   = $ficha->getCoxaPD();
            $coxaPE                   = $ficha->getCoxaPE();
            $coxaMD                   = $ficha->getCoxaMD();
            $coxaME                   = $ficha->getCoxaME();
            $panturrilhaD             = $ficha->getPanturrilhaD();
            $panturrilhaE             = $ficha->getPanturrilhaE();

            $protocoloDC              = $ficha->getProtocoloDC();

            $bicipitalD1             = $ficha->getBicipitalD1();
            $bicipitalD2             = $ficha->getBicipitalD2();
            $mediaBD                 = $ficha->getMediaBD();
            $bicipitalEU             = $ficha->getBicipitalEU();

            $tricipitalD1            = $ficha->getTricipitalD1();
            $tricipitalD2            = $ficha->getTricipitalD2();
            $mediaTD                 = $ficha->getMediaTD();
            $tricipitalEU            = $ficha->getTricipitalEU();

            $toracicaD1              = $ficha->getToracicaD1();
            $toracicaD2              = $ficha->getToracicaD2();
            $mediaT_D                = $ficha->getMediaT_D();
            $toracicaEU              = $ficha->getToracicaEU();

            $subescapularD1          = $ficha->getSubescapularD1();
            $subescapularD2          = $ficha->getSubescapularD2();
            $mediaSD                 = $ficha->getMediaSD();
            $subescapularEU          = $ficha->getSubescapularEU();

            $axiliarmediaD1          = $ficha->getAxiliarMediaD1();
            $axiliarmediaD2          = $ficha->getAxiliarMediaD2();
            $mediaAMD                = $ficha->getMediaAMD();
            $axiliarmediaEU          = $ficha->getAxiliarMediaEU();

            $suprailiacaD1           = $ficha->getSupraIliacaD1();
            $suprailiacaD2           = $ficha->getSupraIliacaD2();
            $mediaSID                = $ficha->getMediaSID();
            $suprailiacaEU           = $ficha->getSupraIliacaEU();

            $abdominalD1             = $ficha->getAbdominalD1();
            $abdominalD2             = $ficha->getAbdominalD2();
            $mediaAD                 = $ficha->getMediaAD();
            $abdominalEU             = $ficha->getAbdominalEU();

            $coxaD1                  = $ficha->getCoxaD1();
            $coxaD2                  = $ficha->getCoxaD2();
            $mediaCD                 = $ficha->getMediaCD();
            $coxaEU                  = $ficha->getCoxaEU();

            $panturrilhamedialD1     = $ficha->getPanturrilhaMedialD1();
            $panturrilhamedialD2     = $ficha->getPanturrilhaMedialD2();
            $mediaPMD                = $ficha->getMediaPMD();
            $panturrilhamedialEU     = $ficha->getPanturrilhaMedialEU();

            $abdomen                 = $ficha->getAbdomen();
            $abdomencheck            = $ficha->getAbdomenCheck();
            $flexao                  = $ficha->getFlexao();
            $flexaocheck             = $ficha->getFlexaoCheck();

            $gorduracorporal         = $ficha->getGorduraCorporal();
            $massamuscular           = $ficha->getMassaMuscular();
            $agua                    = $ficha->getAgua();
            $proteina                = $ficha->getProteina();
            $gorduravisceral         = $ficha->getGorduraVisceral();
            $massaossea_p            = $ficha->getMassaOsseaP();
            $massaossea_kg           = $ficha->getMassaOsseaKG();
            $idadecorporal           = $ficha->getIdadeCorporal();
            $taxametabolismo         = $ficha->getTaxaMetabolismo();
            
            // Inserindo novas fichas de alunos no banco e retornando para confirmar
            $this->insert(
                'dados_ficha',
                ":codigo_aluno,:numero_ficha,:data_ficha,:objetivo,:observacao,:altura,:idade,:peso,:sexo",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':data_ficha'=>$data_ficha,
                    ':objetivo'=>$objetivo,
                    ':observacao'=>$observacao,
                    ':altura'=>$altura,
                    ':idade'=>$idade,
                    ':peso'=>$peso,
                    ':sexo'=>$sexo
                ]
            );
            $this->insert(
                'perimetria',
                ":codigo_aluno,:numero_ficha,:pescoco,:deltoides,:torax,:abdome_c,:abdome_m,:quadril",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':pescoco'=>$pescoco,
                    ':deltoides'=>$deltoides,
                    ':torax'=>$torax,
                    ':abdome_c'=>$abdome_c,
                    ':abdome_m'=>$abdome_m,
                    ':quadril'=>$quadril
                ]
            );
            $this->insert(
                'direita_esquerda',
                ":codigo_aluno,:numero_ficha,:bracoCD,:bracoCE,:bracoRD,:bracoRE,:antebracoD,:antebracoE,:coxaPD,:coxaPE,:coxaMD,:coxaME,:panturrilhaD,:panturrilhaE",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':bracoCD'=>$bracoCD,
                    ':bracoCE'=>$bracoCE,
                    ':bracoRD'=>$bracoRD,
                    ':bracoRE'=>$bracoRE,
                    ':antebracoD'=>$antebracoD,
                    ':antebracoE'=>$antebracoE,
                    ':coxaPD'=>$coxaPD,
                    ':coxaPE'=>$coxaPE,
                    ':coxaMD'=>$coxaMD,
                    ':coxaME'=>$coxaME,
                    ':panturrilhaD'=>$panturrilhaD,
                    ':panturrilhaE'=>$panturrilhaE
                ]
            );
            $this->insert(
                'protocolos',
                ":codigo_aluno,:numero_ficha,:protocoloDC",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':protocoloDC'=>$protocoloDC
                ]
            );
            $this->insert(
                'bicipital',
                ":codigo_aluno,:numero_ficha,:bicipitalD1,:bicipitalD2,:mediaBD,:bicipitalEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':bicipitalD1'=>$bicipitalD1,
                    ':bicipitalD2'=>$bicipitalD2,
                    ':mediaBD'=>$mediaBD,
                    ':bicipitalEU'=>$bicipitalEU
                ]
            );
            $this->insert(
                'tricipital',
                ":codigo_aluno,:numero_ficha,:tricipitalD1,:tricipitalD2,:mediaTD,:tricipitalEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':tricipitalD1'=>$tricipitalD1,
                    ':tricipitalD2'=>$tricipitalD2,
                    ':mediaTD'=>$mediaTD,
                    ':tricipitalEU'=>$tricipitalEU
                ]
            );
            $this->insert(
                'toracica',
                ":codigo_aluno,:numero_ficha,:toracicaD1,:toracicaD2,:mediaT_D,:toracicaEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':toracicaD1'=>$toracicaD1,
                    ':toracicaD2'=>$toracicaD2,
                    ':mediaT_D'=>$mediaT_D,
                    ':toracicaEU'=>$toracicaEU
                ]
            );
            $this->insert(
                'subescapular',
                ":codigo_aluno,:numero_ficha,:subescapularD1,:subescapularD2,:mediaSD,:subescapularEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':subescapularD1'=>$subescapularD1,
                    ':subescapularD2'=>$subescapularD2,
                    ':mediaSD'=>$mediaSD,
                    ':subescapularEU'=>$subescapularEU
                ]
            );
            $this->insert(
                'axiliar_media',
                ":codigo_aluno,:numero_ficha,:axiliarmediaD1,:axiliarmediaD2,:mediaAMD,:axiliarmediaEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':axiliarmediaD1'=>$axiliarmediaD1,
                    ':axiliarmediaD2'=>$axiliarmediaD2,
                    ':mediaAMD'=>$mediaAMD,
                    ':axiliarmediaEU'=>$axiliarmediaEU
                ]
            );
            $this->insert(
                'supra_iliaca',
                ":codigo_aluno,:numero_ficha,:suprailiacaD1,:suprailiacaD2,:mediaSID,:suprailiacaEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':suprailiacaD1'=>$suprailiacaD1,
                    ':suprailiacaD2'=>$suprailiacaD2,
                    ':mediaSID'=>$mediaSID,
                    ':suprailiacaEU'=>$suprailiacaEU
                ]
            );
            $this->insert(
                'abdominal',
                ":codigo_aluno,:numero_ficha,:abdominalD1,:abdominalD2,:mediaAD,:abdominalEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':abdominalD1'=>$abdominalD1,
                    ':abdominalD2'=>$abdominalD2,
                    ':mediaAD'=>$mediaAD,
                    ':abdominalEU'=>$abdominalEU
                ]
            );
            $this->insert(
                'coxa',
                ":codigo_aluno,:numero_ficha,:coxaD1,:coxaD2,:mediaCD,:coxaEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':coxaD1'=>$coxaD1,
                    ':coxaD2'=>$coxaD2,
                    ':mediaCD'=>$mediaCD,
                    ':coxaEU'=>$coxaEU
                ]
            );
            $this->insert(
                'panturrilha_medial',
                ":codigo_aluno,:numero_ficha,:panturrilhamedialD1,:panturrilhamedialD2,:mediaPMD,:panturrilhamedialEU",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':panturrilhamedialD1'=>$panturrilhamedialD1,
                    ':panturrilhamedialD2'=>$panturrilhamedialD2,
                    ':mediaPMD'=>$mediaPMD,
                    ':panturrilhamedialEU'=>$panturrilhamedialEU
                ]
            );
            $this->insert(
                'teste_resistencia_muscular',
                ":codigo_aluno,:numero_ficha,:abdomen,:abdomencheck,:flexao,:flexaocheck",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':abdomen'=>$abdomen,
                    ':abdomencheck'=>$abdomencheck,
                    ':flexao'=>$flexao,
                    ':flexaocheck'=>$flexaocheck
                ]
            );
            return $this->insert(
                'bioimpedancia',
                ":codigo_aluno,:numero_ficha,:gorduracorporal,:massamuscular,:agua,:proteina,:gorduravisceral,:massaossea_p,:massaossea_kg,:idadecorporal,:taxametabolismo",
                [
                    ':codigo_aluno'=>$codigo_aluno,
                    ':numero_ficha'=>$numero_ficha,
                    ':gorduracorporal'=>$gorduracorporal,
                    ':massamuscular'=>$massamuscular,
                    ':agua'=>$agua,
                    ':proteina'=>$proteina,
                    ':gorduravisceral'=>$gorduravisceral,
                    ':massaossea_p'=>$massaossea_p,
                    ':massaossea_kg'=>$massaossea_kg,
                    ':idadecorporal'=>$idadecorporal,
                    ':taxametabolismo'=>$taxametabolismo
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function dadosFicha($codigoAluno, $numeroFicha)
    {
        $ficha = $this->select(
            "SELECT numero_ficha FROM dados_ficha WHERE codigo_aluno = '$codigoAluno'"
        );

        $dadosFicha = $this->select(
            "SELECT * FROM dados_ficha WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );

        $perimetria = $this->select(
            "SELECT * FROM perimetria WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );

        $direita_esquerda = $this->select(
            "SELECT * FROM direita_esquerda WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );

        $protocolo = $this->select(
            "SELECT * FROM protocolos WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $bicipital = $this->select(
            "SELECT * FROM bicipital WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $tricipital = $this->select(
            "SELECT * FROM tricipital WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $toracica = $this->select(
            "SELECT * FROM toracica WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $subescapular = $this->select(
            "SELECT * FROM subescapular WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $axiliar_media = $this->select(
            "SELECT * FROM axiliar_media WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $supra_iliaca = $this->select(
            "SELECT * FROM supra_iliaca WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $abdominal = $this->select(
            "SELECT * FROM abdominal WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $coxa = $this->select(
            "SELECT * FROM coxa WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $panturrilha_medial = $this->select(
            "SELECT * FROM panturrilha_medial WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $bioimpedancia = $this->select(
            "SELECT * FROM bioimpedancia WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );
        $teste_resistencia_muscular = $this->select(
            "SELECT * FROM teste_resistencia_muscular WHERE codigo_aluno = '$codigoAluno' AND numero_ficha = '$numeroFicha'"
        );

        return [
            'ficha'                         =>$ficha->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'dadosFicha'                    =>$dadosFicha->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'perimetria'                    =>$perimetria->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'direita_esquerda'              =>$direita_esquerda->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'protocolo'                     =>$protocolo->fetch()['protocoloDC'],
            'bicipital'                     =>$bicipital->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'tricipital'                    =>$tricipital->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'toracica'                      =>$toracica->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'subescapular'                  =>$subescapular->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'axiliar_media'                 =>$axiliar_media->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'supra_iliaca'                  =>$supra_iliaca->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'abdominal'                     =>$abdominal->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'coxa'                          =>$coxa->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'panturrilha_medial'            =>$panturrilha_medial->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'bioimpedancia'                 =>$bioimpedancia->fetchAll(\PDO::FETCH_CLASS, Ficha::class),
            'teste_resistencia_muscular'    =>$teste_resistencia_muscular->fetchAll(\PDO::FETCH_CLASS, Ficha::class)
        ];
    }
}
