<?php

namespace App\Models\Entidades;

class Ficha
{
    // Valores Privados de Fichas
    private $id;
    private $codigo_aluno;
    private $numero_ficha;
    
    private $data_ficha;
    private $objetivo;
    private $observacao;
    private $altura;
    private $idade;
    private $peso;
    private $sexo;

    private $pescoco;
    private $deltoides;
    private $torax;
    private $abdome_c;
    private $abdome_m;
    private $quadril;

    private $bracoCD;
    private $bracoCE;
    private $bracoRD;
    private $bracoRE;
    private $antebracoD;
    private $antebracoE;
    private $coxaPD;
    private $coxaPE;
    private $coxaMD;
    private $coxaME;
    private $panturrilhaD;
    private $panturrilhaE;

    private $protocoloDC;

    private $bicipitalD1;
    private $bicipitalD2;
    private $mediaBD;
    private $bicipitalEU;

    private $tricipitalD1;
    private $tricipitalD2;
    private $mediaTD;
    private $tricipitalEU;

    private $toracicaD1;
    private $toracicaD2;
    private $mediaT_D;
    private $toracicaEU;

    private $subescapularD1;
    private $subescapularD2;
    private $mediaSD;
    private $subescapularEU;

    private $axiliarmediaD1;
    private $axiliarmediaD2;
    private $mediaAMD;
    private $axiliarmediaEU;

    private $suprailiacaD1;
    private $suprailiacaD2;
    private $mediaSID;
    private $suprailiacaEU;

    private $abdominalD1;
    private $abdominalD2;
    private $mediaAD;
    private $abdominalEU;

    private $coxaD1;
    private $coxaD2;
    private $mediaCD;
    private $coxaEU;

    private $panturrilhamedialD1;
    private $panturrilhamedialD2;
    private $mediaPMD;
    private $panturrilhamedialEU;

    private $abdomen;
    private $abdomencheck;
    private $flexao;
    private $flexaocheck;

    private $gorduracorporal;
    private $massamusular;
    private $agua;
    private $proteina;
    private $gorduravisceral;
    private $massaossea_p;
    private $massaossea_kg;
    private $idadecorporal;
    private $taxametabolismo;

    // Dados das Fichas
    public function getId()
    {
        return $this->idf;
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
    public function getNumeroFicha()
    {
        return $this->numero_ficha;
    }
    public function setNumeroFicha($numero_ficha)
    {
        $this->numero_ficha = $numero_ficha;
    }

    // -----------------------------------------------

    public function getDataFicha()
    {
        return $this->data_ficha;
    }
    public function setDataFicha($data_ficha)
    {
        $this->data_ficha = $data_ficha;
    }
    public function getObjetivo()
    {
        return $this->objetivo;
    }
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    }
    public function getObservacao()
    {
        return $this->observacao;
    }
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    // -----------------------------------------------

    public function getPescoco()
    {
        return $this->pescoco;
    }
    public function setPescoco($pescoco)
    {
        $this->pescoco = $pescoco;
    }

    public function getDeltoides()
    {
        return $this->deltoides;
    }
    public function setDeltoides($deltoides)
    {
        $this->deltoides = $deltoides;
    }

    public function getTorax()
    {
        return $this->torax;
    }
    public function setTorax($torax)
    {
        $this->torax = $torax;
    }

    public function getAbdomeC()
    {
        return $this->abdome_c;
    }
    public function setAbdomeC($abdome_c)
    {
        $this->abdome_c = $abdome_c;
    }

    public function getAbdomeM()
    {
        return $this->abdome_m;
    }
    public function setAbdomeM($abdome_m)
    {
        $this->abdome_m = $abdome_m;
    }

    public function getQuadril()
    {
        return $this->quadril;
    }
    public function setQuadril($quadril)
    {
        $this->quadril = $quadril;
    }

    // -----------------------------------------------

    public function getBracoCD()
    {
        return $this->bracoCD;
    }
    public function setBracoCD($bracoCD)
    {
        $this->bracoCD = $bracoCD;
    }

    public function getBracoCE()
    {
        return $this->bracoCE;
    }
    public function setBracoCE($bracoCE)
    {
        $this->bracoCE = $bracoCE;
    }

    public function getBracoRD()
    {
        return $this->bracoRD;
    }
    public function setBracoRD($bracoRD)
    {
        $this->bracoRD = $bracoRD;
    }

    public function getBracoRE()
    {
        return $this->bracoRE;
    }
    public function setBracoRE($bracoRE)
    {
        $this->bracoRE = $bracoRE;
    }

    public function getAntebracoD()
    {
        return $this->antebracoD;
    }
    public function setAntebracoD($antebracoD)
    {
        $this->antebracoD = $antebracoD;
    }

    public function getAntebracoE()
    {
        return $this->antebracoE;
    }
    public function setAntebracoE($antebracoE)
    {
        $this->antebracoE = $antebracoE;
    }

    public function getCoxaPD()
    {
        return $this->coxaPD;
    }
    public function setCoxaPD($coxaPD)
    {
        $this->coxaPD = $coxaPD;
    }

    public function getCoxaPE()
    {
        return $this->coxaPE;
    }
    public function setCoxaPE($coxaPE)
    {
        $this->coxaPE = $coxaPE;
    }

    public function getCoxaMD()
    {
        return $this->coxaMD;
    }
    public function setCoxaMD($coxaMD)
    {
        $this->coxaMD = $coxaMD;
    }

    public function getCoxaME()
    {
        return $this->coxaME;
    }
    public function setCoxaME($coxaME)
    {
        $this->coxaME = $coxaME;
    }

    public function getPanturrilhaD()
    {
        return $this->panturrilhaD;
    }
    public function setPanturrilhaD($panturrilhaD)
    {
        $this->panturrilhaD = $panturrilhaD;
    }

    public function getPanturrilhaE()
    {
        return $this->panturrilhaE;
    }
    public function setPanturrilhaE($panturrilhaE)
    {
        $this->panturrilhaE = $panturrilhaE;
    }

    // ---------

    public function getProtocoloDC()
    {
        return $this->protocoloDC;
    }
    public function setProtocoloDC($protocoloDC)
    {
        $this->protocoloDC = $protocoloDC;
    }

    public function getBicipitalD1()
    {
        return $this->bicipitalD1;
    }
    public function setBicipitalD1($bicipitalD1)
    {
        $this->bicipitalD1 = $bicipitalD1;
    }
    public function getBicipitalD2()
    {
        return $this->bicipitalD2;
    }
    public function setBicipitalD2($bicipitalD2)
    {
        $this->bicipitalD2 = $bicipitalD2;
    }
    public function getMediaBD()
    {
        return $this->mediaBD;
    }
    public function setMediaBD($mediaBD)
    {
        $this->mediaBD = $mediaBD;
    }
    public function getBicipitalEU()
    {
        return $this->bicipitalEU;
    }
    public function setBicipitalEU($bicipitalEU)
    {
        $this->bicipitalEU = $bicipitalEU;
    }

    public function getTricipitalD1()
    {
        return $this->tricipitalD1;
    }
    public function setTricipitalD1($tricipitalD1)
    {
        $this->tricipitalD1 = $tricipitalD1;
    }
    public function getTricipitalD2()
    {
        return $this->tricipitalD2;
    }
    public function setTricipitalD2($tricipitalD2)
    {
        $this->tricipitalD2 = $tricipitalD2;
    }
    public function getMediaTD()
    {
        return $this->mediaTD;
    }
    public function setMediaTD($mediaTD)
    {
        $this->mediaTD = $mediaTD;
    }
    public function getTricipitalEU()
    {
        return $this->tricipitalEU;
    }
    public function setTricipitalEU($tricipitalEU)
    {
        $this->tricipitalEU = $tricipitalEU;
    }

    public function getToracicaD1()
    {
        return $this->toracicaD1;
    }
    public function setToracicaD1($toracicaD1)
    {
        $this->toracicaD1 = $toracicaD1;
    }
    public function getToracicaD2()
    {
        return $this->toracicaD2;
    }
    public function setToracicaD2($toracicaD2)
    {
        $this->toracicaD2 = $toracicaD2;
    }
    public function getMediaT_D()
    {
        return $this->mediaT_D;
    }
    public function setMediaT_D($mediaT_D)
    {
        $this->mediaT_D = $mediaT_D;
    }
    public function getToracicaEU()
    {
        return $this->toracicaEU;
    }
    public function setToracicaEU($toracicaEU)
    {
        $this->toracicaEU = $toracicaEU;
    }

    public function getSubescapularD1()
    {
        return $this->subescapularD1;
    }
    public function setSubescapularD1($subescapularD1)
    {
        $this->subescapularD1 = $subescapularD1;
    }
    public function getSubescapularD2()
    {
        return $this->subescapularD2;
    }
    public function setSubescapularD2($subescapularD2)
    {
        $this->subescapularD2 = $subescapularD2;
    }
    public function getMediaSD()
    {
        return $this->mediaSD;
    }
    public function setMediaSD($mediaSD)
    {
        $this->mediaSD = $mediaSD;
    }
    public function getSubescapularEU()
    {
        return $this->subescapularEU;
    }
    public function setSubescapularEU($subescapularEU)
    {
        $this->subescapularEU = $subescapularEU;
    }

    public function getAxiliarMediaD1()
    {
        return $this->axiliarmediaD1;
    }
    public function setAxiliarMediaD1($axiliarmediaD1)
    {
        $this->axiliarmediaD1 = $axiliarmediaD1;
    }
    public function getAxiliarMediaD2()
    {
        return $this->axiliarmediaD2;
    }
    public function setAxiliarMediaD2($axiliarmediaD2)
    {
        $this->axiliarmediaD2 = $axiliarmediaD2;
    }
    public function getMediaAMD()
    {
        return $this->mediaAMD;
    }
    public function setMediaAMD($mediaAMD)
    {
        $this->mediaAMD = $mediaAMD;
    }
    public function getAxiliarMediaEU()
    {
        return $this->axiliarmediaEU;
    }
    public function setAxiliarMediaEU($axiliarmediaEU)
    {
        $this->axiliarmediaEU = $axiliarmediaEU;
    }

    public function getSupraIliacaD1()
    {
        return $this->suprailiacaD1;
    }
    public function setSupraIliacaD1($suprailiacaD1)
    {
        $this->suprailiacaD1 = $suprailiacaD1;
    }
    public function getSupraIliacaD2()
    {
        return $this->suprailiacaD2;
    }
    public function setSupraIliacaD2($suprailiacaD2)
    {
        $this->suprailiacaD2 = $suprailiacaD2;
    }
    public function getMediaSID()
    {
        return $this->mediaSID;
    }
    public function setMediaSID($mediaSID)
    {
        $this->mediaSID = $mediaSID;
    }
    public function getSupraIliacaEU()
    {
        return $this->suprailiacaEU;
    }
    public function setSupraIliacaEU($suprailiacaEU)
    {
        $this->suprailiacaEU = $suprailiacaEU;
    }

    public function getAbdominalD1()
    {
        return $this->abdominalD1;
    }
    public function setAbdominalD1($abdominalD1)
    {
        $this->abdominalD1 = $abdominalD1;
    }
    public function getAbdominalD2()
    {
        return $this->abdominalD2;
    }
    public function setAbdominalD2($abdominalD2)
    {
        $this->abdominalD2 = $abdominalD2;
    }
    public function getMediaAD()
    {
        return $this->mediaAD;
    }
    public function setMediaAD($mediaAD)
    {
        $this->mediaAD = $mediaAD;
    }
    public function getAbdominalEU()
    {
        return $this->abdominalEU;
    }
    public function setAbdominalEU($abdominalEU)
    {
        $this->abdominalEU = $abdominalEU;
    }

    public function getCoxaD1()
    {
        return $this->coxaD1;
    }
    public function setCoxaD1($coxaD1)
    {
        $this->coxaD1 = $coxaD1;
    }
    public function getCoxaD2()
    {
        return $this->coxaD2;
    }
    public function setCoxaD2($coxaD2)
    {
        $this->coxaD2 = $coxaD2;
    }
    public function getMediaCD()
    {
        return $this->mediaCD;
    }
    public function setMediaCD($mediaCD)
    {
        $this->mediaCD = $mediaCD;
    }
    public function getCoxaEU()
    {
        return $this->coxaEU;
    }
    public function setCoxaEU($coxaEU)
    {
        $this->coxaEU = $coxaEU;
    }

    public function getPanturrilhaMedialD1()
    {
        return $this->panturrilhamedialD1;
    }
    public function setPanturrilhaMedialD1($panturrilhamedialD1)
    {
        $this->panturrilhamedialD1 = $panturrilhamedialD1;
    }
    public function getPanturrilhaMedialD2()
    {
        return $this->panturrilhamedialD2;
    }
    public function setPanturrilhaMedialD2($panturrilhamedialD2)
    {
        $this->panturrilhamedialD2 = $panturrilhamedialD2;
    }
    public function getMediaPMD()
    {
        return $this->mediaPMD;
    }
    public function setMediaPMD($mediaPMD)
    {
        $this->mediaPMD = $mediaPMD;
    }
    public function getPanturrilhaMedialEU()
    {
        return $this->panturrilhamedialEU;
    }
    public function setPanturrilhaMedialEU($panturrilhamedialEU)
    {
        $this->panturrilhamedialEU = $panturrilhamedialEU;
    }

    public function getAbdomen()
    {
        return $this->abdomen;
    }
    public function setAbdomen($abdomen)
    {
        $this->abdomen = $abdomen;
    }
    public function getAbdomenCheck()
    {
        return $this->abdomencheck;
    }
    public function setAbdomenCheck($abdomencheck)
    {
        $this->abdomencheck = $abdomencheck;
    }
    public function getFlexao()
    {
        return $this->flexao;
    }
    public function setFlexao($flexao)
    {
        $this->flexao = $flexao;
    }
    public function getFlexaoCheck()
    {
        return $this->flexaocheck;
    }
    public function setFlexaoCheck($flexaocheck)
    {
        $this->flexaocheck = $flexaocheck;
    }

    // ------

    public function getGorduraCorporal()
    {
        return $this->gorduracorporal;
    }
    public function setGorduraCorporal($gorduracorporal)
    {
        $this->gorduracorporal = $gorduracorporal;
    }
    public function getMassaMuscular()
    {
        return $this->massamuscular;
    }
    public function setMassaMuscular($massamuscular)
    {
        $this->massamuscular = $massamuscular;
    }
    public function getAgua()
    {
        return $this->agua;
    }
    public function setAgua($agua)
    {
        $this->agua = $agua;
    }
    public function getProteina()
    {
        return $this->proteina;
    }
    public function setProteina($proteina)
    {
        $this->proteina = $proteina;
    }
    public function getGorduraVisceral()
    {
        return $this->gorduravisceral;
    }
    public function setGorduraVisceral($gorduravisceral)
    {
        $this->gorduravisceral = $gorduravisceral;
    }
    public function getMassaOsseaP()
    {
        return $this->massaossea_p;
    }
    public function setMassaOsseaP($massaossea_p)
    {
        $this->massaossea_p = $massaossea_p;
    }
    public function getMassaOsseaKG()
    {
        return $this->massaossea_kg;
    }
    public function setMassaOsseaKG($massaossea_kg)
    {
        $this->massaossea_kg = $massaossea_kg;
    }
    public function getIdadeCorporal()
    {
        return $this->idadecorporal;
    }
    public function setIdadeCorporal($idadecorporal)
    {
        $this->idadecorporal = $idadecorporal;
    }
    public function getTaxaMetabolismo()
    {
        return $this->taxametabolismo;
    }
    public function setTaxaMetabolismo($taxametabolismo)
    {
        $this->taxametabolismo = $taxametabolismo;
    }
}