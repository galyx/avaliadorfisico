<?php

namespace App\Lib;

use App\Models\Entidades\Ficha;
use App\Models\Entidades\TesteResultado;

class Resultado
{
    // Pegar o porcentual de gordura
    private $PGCDC;
    public function getPGCDC()
    {
        return $this->PGCDC;
    }

    // Pegar o porcentual de gordura
    private $PGCB;
    public function getPGCB()
    {
        return $this->PGCB;
    }

    // Verificação da Bioimpedancia
    public function BioimpedanciaModel($BioimpedanciaModel, $Dados)
    {
        // Parametro setado com array
        $retornoBTR = [];

        // Sexo e Idade
        foreach($Dados as $D)
        {
            $sexo = $D->getSexo();
            $idade = $D->getIdade();
        }

        // Bioimpedancia
        foreach($BioimpedanciaModel as $BM)
        {
            $GC = $BM->getGorduraCorporal();
            $MM = $BM->getMassaMuscular();
            $A = $BM->getAgua();
            $P = $BM->getProteina();
            $GV = $BM->getGorduraVisceral();
        }

        // Resultado de valores
        $Resultado = new Bioimpedancia();

        // Teste de resultados
        $BioTR = new TesteResultado();

        // Retorna Resultados
        $BioTR->setGCRTeste($Resultado->GCR($GC,$idade,$sexo));
        $BioTR->setMMRTeste($Resultado->MMR($MM,$sexo));
        $BioTR->setARTeste($Resultado->AR($A,$sexo));
        $BioTR->setPRTeste($Resultado->PR($P));
        $BioTR->setGVRTeste($Resultado->GVR($GV));

        $this->PGCB = $GC;

        $retornoBTR[] = $BioTR;

        return $retornoBTR;
    }

    // Verificação do Teste de Resistencia Muscular
    public function TesteResistenciaMuscularModel($TRM, $Dados)
    {
        // Parametro setado com array
        $retornoBTR = [];
        
        // Sexo e Idade
        foreach($Dados as $D)
        {
            $sexo = $D->getSexo();
            $idade = $D->getIdade();
        }

        // Teste de resistencia Muscular
        foreach($TRM as $TRMM)
        {
            $A = $TRMM->getAbdomen();
            $F = $TRMM->getFlexao();
        }

        // Resultado de valores
        $Resultado = new TesteResistenciaMuscular();

        // Teste de resultados
        $TRMTR = new TesteResultado();

        // Retorna Resultados
        $TRMTR->setTRMATeste($Resultado->AR($A,$idade,$sexo));
        $TRMTR->setTRMFTeste($Resultado->FR($A,$idade,$sexo));

        $retornoTRMTR[] = $TRMTR;

        return $retornoTRMTR;
    }

    // Resultado final para os PROTOCOLOS,IMC e RCQ
    public function ResultadoModel($Perimetria,$Dados,$Protocolo,$Bicipital,$Tricipital,$Toracica,$Subescapular,$AxiliarMedia,$SupraIliaca,$Abdominal,$Coxa,$PanturrilhaMedial)
    {
        // Parametro setado com array
        $retornoBTR = [];

        // Perimetria
        foreach($Perimetria as $P)
        {
            $abdome_c = $P->getAbdomeC();
            $quadril = $P->getQuadril();
        }
        // Dados da Ficha
        foreach($Dados as $D)
        {
            $sexo = $D->getSexo();
            $idade = $D->getIdade();
            $altura = $D->getAltura();
            $peso = $D->getPeso();
        }
        // Bicipital
        foreach($Bicipital as $B)
        {
            $MediaBD = $B->getMediaBD();
        }
        // Tricipital
        foreach($Tricipital as $T)
        {
            $MediaTD = $T->getMediaTD();
        }
        // Toracica
        foreach($Toracica as $To)
        {
            $MediaT_D = $To->getMediaT_D();
        }
        // Subescapular
        foreach($Subescapular as $S)
        {
            $MediaSD = $S->getMediaSD();
        }
        // Axiliar Media
        foreach($AxiliarMedia as $AM)
        {
            $MediaAMD = $AM->getMediaAMD();
        }
        // Supra Iliaca
        foreach($SupraIliaca as $SI)
        {
            $MediaSID = $SI->getMediaSID();
        }
        // Abdominal
        foreach($Abdominal as $A)
        {
            $MediaAD = $A->getMediaAD();
        }
        // Coxa
        foreach($Coxa as $C)
        {
            $MediaCD = $C->getMediaCD();
        }
        // Panturrilha Medial
        foreach($PanturrilhaMedial as $PM)
        {
            $MediaPMD = $PM->getMediaPMD();
        }

        $ResultadoProtocolos = new ResultadoProtocolos();

        $RPTR = new TesteResultado();

        $RPTR->setDCTeste($ResultadoProtocolos->DCResultado($sexo,$idade,$Protocolo,$MediaBD,$MediaTD,$MediaT_D,$MediaSD,$MediaAMD,$MediaSID,$MediaAD,$MediaCD,$MediaPMD));
        $RPTR->setPGTeste($ResultadoProtocolos->PGResultado($RPTR->getDCTeste(),$sexo,$idade));
        $RPTR->setPPGTeste($ResultadoProtocolos->PPGResultado($RPTR->getPGTeste(),$sexo,$idade));
        $RPTR->setIMCTeste($ResultadoProtocolos->IMCResultado($altura,$peso));
        $RPTR->setIMCTTeste($ResultadoProtocolos->IMCTResultado($RPTR->getIMCTeste()));
        $RPTR->setRCQTeste($ResultadoProtocolos->RCQResultado($abdome_c,$quadril));
        $RPTR->setRCQTTeste($ResultadoProtocolos->RCQTResultado($RPTR->getRCQTeste(),$sexo,$idade));

        // Setando o Porcentual no private PG
        $this->PGCDC = $ResultadoProtocolos->PGResultado($RPTR->getDCTeste(),$sexo,$idade);

        $retornoDCTR[] = $RPTR;

        return $retornoDCTR;
    }

    // Chart Composição Corporal / Tabela
    public function ChartCCModel($Dados)
    {
        // Parametro setado com array
        $retornoChartCC = [];

        // Dados da altura
        foreach($Dados as $D)
        {
            $altura = $D->getAltura();
        }

        // Teste de resultados
        $ChartCCTR = new TesteResultado();

        $altura = str_replace(',','.',$altura);

        if($altura <= 1.50){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("42");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("56");
        }elseif($altura <= 1.52){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("43");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("57");
        }elseif($altura <= 1.54){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("44");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("59");
        }elseif($altura <= 1.56){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("46");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("60");
        }elseif($altura <= 1.58){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("47");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("62");
        }elseif($altura <= 1.60){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("48");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("64");
        }elseif($altura <= 1.62){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("49");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("65");
        }elseif($altura <= 1.64){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("50");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("67");
        }elseif($altura <= 1.66){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("51");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("68");
        }elseif($altura <= 1.68){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("53");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("70");
        }elseif($altura <= 1.70){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("54");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("72");
        }elseif($altura <= 1.72){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("55");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("73");
        }elseif($altura <= 1.74){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("57");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("75");
        }elseif($altura <= 1.76){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("58");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("77");
        }elseif($altura <= 1.78){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("59");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("79");
        }elseif($altura <= 1.80){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("60");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("81");
        }elseif($altura <= 1.82){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("62");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("82");
        }elseif($altura <= 1.84){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("63");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("84");
        }elseif($altura <= 1.86){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("65");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("86");
        }elseif($altura <= 1.88){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("66");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("88");
        }elseif($altura <= 1.90){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("67");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("90");
        }elseif($altura <= 1.92){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("69");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("92");
        }elseif($altura <= 1.94){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("70");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("94");
        }elseif($altura <= 1.96){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("72");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("96");
        }elseif($altura <= 1.98){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("73");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("98");
        }elseif($altura <= 2.00){
            // Ideal Minimo(Peso)
            $ChartCCTR->setChartCCMinimoTeste("75");
            // Ideal Maximo(Peso)
            $ChartCCTR->setChartCCMaximoTeste("100");
        }

        $retornoChartCC[] = $ChartCCTR;
        return $retornoChartCC;
    }

    // Chart %G Corporal Dobras Cutâneas
    public function ChartGCDCModel($Dados)
    {
        // Parametro setado com array
        $retornoChartGCDC = [];

        // Dados da altura
        foreach($Dados as $D)
        {
            $idade = $D->getIdade();
            $sexo = $D->getSexo();
        }

        // Porcentual de Gordura
        $PGCDC = new PorcentualGordura();

        // Teste de resultados
        $ChartGCDCTR = new TesteResultado();

        $ChartGCDCTR->setChartGCDCIdealTeste($PGCDC->PGIdeal(Resultado::getPGCDC(),$sexo,$idade));
        $ChartGCDCTR->setChartGCDCAceitavelTeste($PGCDC->PGAceitavel(Resultado::getPGCDC(),$sexo,$idade));

        $retornoChartGCDC[] = $ChartGCDCTR;
        return $retornoChartGCDC;
    }

    // Chart %G Corporal Bioimpedancia
    public function ChartGCBModel($Dados)
    {
        // Parametro setado com array
        $retornoChartGCB = [];

        // Dados da altura
        foreach($Dados as $D)
        {
            $idade = $D->getIdade();
            $sexo = $D->getSexo();
        }

        // Porcentual de Gordura
        $PGCB = new PorcentualGordura();

        // Teste de resultados
        $ChartGCBTR = new TesteResultado();

        $ChartGCBTR->setChartGCBIdealTeste($PGCB->PGIdeal(Resultado::getPGCB(),$sexo,$idade));
        $ChartGCBTR->setChartGCBAceitavelTeste($PGCB->PGAceitavel(Resultado::getPGCB(),$sexo,$idade));

        $retornoChartGCB[] = $ChartGCBTR;
        return $retornoChartGCB;
    }
}

// Bioimpedancia
class Bioimpedancia
{
    // Tabela de perigo
    // Gordura Corporal
    public function GCR($GC,$idade,$sexo)
    {
        if($sexo == "feminino"){ // Feminino
            // Tabela por idade
            if($idade >= 18 & $idade <=25){
                // Tabela em porcentagem
                if($GC <= 13){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 13 & $GC <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 17 & $GC <= 19){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 20 & $GC <= 22){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 23 & $GC <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 26 & $GC <= 28){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 29 & $GC <= 31){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 31){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 26 & $idade <=35){
                // Tabela em porcentagem
                if($GC <= 14){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 14 & $GC <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 17 & $GC <= 20){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 21 & $GC <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 24 & $GC <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 26 & $GC <= 29){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 30 & $GC <= 33){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 33){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 36 & $idade <=45){
                // Tabela em porcentagem
                if($GC <= 16){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 16 & $GC <= 19){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 20 & $GC <= 23){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 24 & $GC <= 26){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 27 & $GC <= 30){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 30 & $GC <= 32){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 33 & $GC <= 36){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 36){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 46 & $idade <=55){
                // Tabela em porcentagem
                if($GC <= 17){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 17 & $GC <= 21){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 22 & $GC <= 25){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 26 & $GC <= 28){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 29 & $GC <= 31){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 32 & $GC <= 34){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 35 & $GC <= 38){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 38){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 56 & $idade <=65){
                // Tabela em porcentagem
                if($GC <= 18){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 18 & $GC <= 22){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 23 & $GC <= 26){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 27 & $GC <= 29){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 30 & $GC <= 32){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 33 & $GC <= 35){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 36 & $GC <= 38){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 38){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }
            return false;
        }elseif($sexo == "masculino"){ // Masculino
            // Tabela por idade
            if($idade >= 18 & $idade <=25){
                // Tabela em porcentagem
                if($GC <= 4){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 4 & $GC <= 6){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 7 & $GC <= 10){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 11 & $GC <= 13){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 14 & $GC <= 16){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 17 & $GC <= 20){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 21 & $GC <= 24){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 24){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 26 & $idade <=35){
                // Tabela em porcentagem
                if($GC <= 8){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 8 & $GC <= 11){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 12 & $GC <= 15){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 16 & $GC <= 18){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 19 & $GC <= 20){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 21 & $GC <= 24){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 25 & $GC <= 27){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 27){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 36 & $idade <=45){
                // Tabela em porcentagem
                if($GC <= 10){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 10 & $GC <= 14){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 15 & $GC <= 18){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 19 & $GC <= 21){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 22 & $GC <= 23){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 24 & $GC <= 25){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 26 & $GC <= 29){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 29){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 46 & $idade <=55){
                // Tabela em porcentagem
                if($GC <= 12){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($GC >= 12 & $GC <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 17 & $GC <= 20){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 21 & $GC <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 24 & $GC <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 26 & $GC <= 27){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 28 & $GC <= 30){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 30){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 56 & $idade <=65){
                // Tabela em porcentagem
                if($GC <= 13){
                    return "<span class='text-yellow'>Muito Baixo</span>";
                }elseif($GC >= 13 & $GC <= 18){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($GC >= 19 & $GC <= 21){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($GC >= 22 & $GC <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($GC >= 24 & $GC <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($GC >= 26 & $GC <= 27){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($GC >= 28 & $GC <= 30){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($GC >= 30){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }
            return false;
        }
        
        return false;
    }
    // Massa Muscular
    public function MMR($MM,$sexo)
    {
        if($sexo == "feminino"){
            if($MM <= 24){
                return "<span class='text-yellow'>Baixo</span>";
            }elseif($MM >= 24 & $MM <= 37){
                return "<span class='text-green'>Padrão</span>";
            }elseif($MM >= 37){
                return "<span class='text-red'>Alto</span>";
            }

            return $MM;
        }elseif($sexo == "masculino"){
            if($MM <= 33){
                return "<span class='text-yellow'>Baixo</span>";
            }elseif($MM >= 33 & $MM <= 48){
                return "<span class='text-green'>Padrão</span>";
            }elseif($MM >= 48){
                return "<span class='text-red'>Alto</span>";
            }

            return false;
        }
        
        return false;
    }
    // Agua
    public function AR($A,$sexo)
    {
        if($sexo == "feminino"){
            if($A <= 45){
                return "<span class='text-yellow'>Baixo</span>";
            }elseif($A >= 45 & $A <= 60){
                return "<span class='text-green'>Padrão</span>";
            }elseif($A >= 60){
                return "<span class='text-red'>Alto</span>";
            }

            return $sexo;
        }elseif($sexo == "masculino"){
            if($A <= 55){
                return "<span class='text-yellow'>Baixo</span>";
            }elseif($A >= 55 & $A <= 65){
                return "<span class='text-green'>Padrão</span>";
            }elseif($A >= 65){
                return "<span class='text-red'>Alto</span>";
            }

            return false;
        }

        return false;
    }
    // Proteina
    public function PR($P)
    {
        if($P <= 16){
            return "<span class='text-yellow'>Baixo</span>";
        }elseif($P >= 16 & $P <= 20){
            return "<span class='text-green'>Padrão</span>";
        }elseif($P >= 20){
            return "<span class='text-red'>Alto</span>";
        }

        return false;
    }
    // Gordura Visceral
    public function GVR($GV)
    {
        if($GV <= 9){
            return "<span class='text-yellow'>Baixo</span>";
        }elseif($GV >= 10 & $GV <= 14){
            return "<span class='text-green'>Padrão</span>";
        }elseif($GV >= 15){
            return "<span class='text-red'>Alto</span>";
        }

        return false;
    }
}
// Teste de Resistencia Muscular
class TesteResistenciaMuscular
{
    // Tabela de Perigo
    // Teste de Abdominal
    public function AR($A,$idade,$sexo)
    {
        if($sexo == "feminino"){
            if($idade >= 15 & $idade <= 19){
                if($A >= 42){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 36 & $A <= 41){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 32 & $A <= 35){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 27 & $A <= 31){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 26){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 20 & $idade <= 29){
                if($A >= 36){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 31 & $A <= 35){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 25 & $A <= 30){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 21 & $A <= 24){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 20){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 30 & $idade <= 39){
                if($A >= 29){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 24 & $A <= 28){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 20 & $A <= 23){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 15 & $A <= 19){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 14){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 40 & $idade <= 49){
                if($A >= 25){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 20 & $A <= 24){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 15 & $A <= 19){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 7 & $A <= 14){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 6){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 50 & $idade <= 59){
                if($A >= 19){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 12 & $A <= 18){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 5 & $A <= 11){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 3 & $A <= 4){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 2){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 60 & $idade <= 69){
                if($A >= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 12 & $A <= 15){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 4 & $A <= 11){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 2 & $A <= 3){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 1){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }

            return false;
        }elseif($sexo == "masculino"){
            if($idade >= 15 & $idade <= 19){
                if($A >= 48){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 42 & $A <= 47){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 38 & $A <= 41){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 33 & $A <= 37){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 32){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 20 & $idade <= 29){
                if($A >= 43){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 37 & $A <= 42){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 33 & $A <= 36){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 29 & $A <= 32){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 28){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 30 & $idade <= 39){
                if($A >= 36){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 31 & $A <= 35){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 27 & $A <= 30){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 22 & $A <= 26){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 21){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 40 & $idade <= 49){
                if($A >= 31){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 26 & $A <= 30){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 22 & $A <= 25){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 17 & $A <= 21){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 16){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 50 & $idade <= 59){
                if($A >= 26){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 22 & $A <= 25){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 18 & $A <= 21){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 13 & $A <= 17){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 12){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 60 & $idade <= 69){
                if($A >= 23){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 17 & $A <= 22){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 12 & $A <= 16){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 7 & $A <= 11){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 6){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }

            return false;
        }

        return false;
    }
    // Teste de Flexao
    public function FR($A,$idade,$sexo)
    {
        if($sexo == "feminino"){
            if($idade >= 15 & $idade <= 19){
                if($A >= 33){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 25 & $A <= 32){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 18 & $A <= 24){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 12 & $A <= 17){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 11){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 20 & $idade <= 29){
                if($A >= 30){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 21 & $A <= 29){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 15 & $A <= 20){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 10 & $A <= 14){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 9){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 30 & $idade <= 39){
                if($A >= 27){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 20 & $A <= 26){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 13 & $A <= 19){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 8 & $A <= 12){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 7){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 40 & $idade <= 49){
                if($A >= 24){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 15 & $A <= 23){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 11 & $A <= 14){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 5 & $A <= 10){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 4){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 50 & $idade <= 59){
                if($A >= 21){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 11 & $A <= 20){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 7 & $A <= 10){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 2 & $A <= 6){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 1){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 60 & $idade <= 69){
                if($A >= 17){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 12 & $A <= 16){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 5 & $A <= 11){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 2 & $A <= 4){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 1){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }

            return false;
        }elseif($sexo == "masculino"){
            if($idade >= 15 & $idade <= 19){
                if($A >= 39){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 29 & $A <= 38){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 23 & $A <= 28){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 18 & $A <= 22){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 17){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 20 & $idade <= 29){
                if($A >= 36){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 29 & $A <= 35){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 22 & $A <= 28){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 17 & $A <= 21){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 16){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 30 & $idade <= 39){
                if($A >= 30){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 22 & $A <= 29){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 17 & $A <= 21){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 12 & $A <= 16){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 11){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 40 & $idade <= 49){
                if($A >= 22){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 17 & $A <= 21){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 13 & $A <= 16){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 10 & $A <= 12){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 9){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 50 & $idade <= 59){
                if($A >= 21){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 13 & $A <= 20){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 10 & $A <= 12){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 7 & $A <= 9){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 6){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }elseif($idade >= 60 & $idade <= 69){
                if($A >= 18){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($A >= 11 & $A <= 17){
                    return "<span class='text-aqua'>Acima da Média</span>";
                }elseif($A >= 8 & $A <= 10){
                    return "<span class='text-aqua'>Média</span>";
                }elseif($A >= 5 & $A <= 7){
                    return "<span class='text-yelow'>Abaixo da Média</span>";
                }elseif($A <= 4){
                    return "<span class='text-red'>Fraco</span>";
                }
                return false;
            }

            return false;
        }

        return false;
    }
}
// Resultado de Protocolos
class ResultadoProtocolos
{
    // Tabelas
    // Densisade Corporal
    public function DCResultado($sexo,$idade,$Protocolo,$MediaBD,$MediaTD,$MediaT_D,$MediaSD,$MediaAMD,$MediaSID,$MediaAD,$MediaCD,$MediaPMD)
    {
        if($sexo == "feminino"){
            if($Protocolo == "P3D"){
                $DC_D = 1.0994921 - 0.0009929*($MediaTD + $MediaSID + $MediaCD) + 0.0000023*(($MediaTD + $MediaSID + $MediaCD)*($MediaTD + $MediaSID + $MediaCD)) - 0.0001392*($idade);

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }elseif($Protocolo == "P7D"){
                $P7D = (str_replace(',','.',$MediaTD) + str_replace(',','.',$MediaT_D) + str_replace(',','.',$MediaSD) + str_replace(',','.',$MediaAMD) + str_replace(',','.',$MediaSID) + str_replace(',','.',$MediaAD) + str_replace(',','.',$MediaCD));
                $DC_D = 1.0970 - (0.00046971*($P7D) + 0.00000056*($P7D*$P7D)) - (0.00012828*($idade));

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }elseif($Protocolo == "D4D"){
                $DC_D = 1.1339 - 0.0645 * log10($MediaTD + $MediaSD + $MediaBD + $MediaSID);

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }

            return false;
        }elseif($sexo == "masculino"){
            if($Protocolo == "P3D"){
                $DC_D = 1.1093800 - 0.0008267*($MediaT_D + $MediaAD + $MediaCD) + 0.0000016*(($MediaT_D + $MediaAD + $MediaCD)*($MediaT_D + $MediaAD + $MediaCD)) - 0.0002574*($idade);

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }elseif($Protocolo == "P7D"){
                $P7D = (str_replace(',','.',$MediaTD) + str_replace(',','.',$MediaT_D) + str_replace(',','.',$MediaSD) + str_replace(',','.',$MediaAMD) + str_replace(',','.',$MediaSID) + str_replace(',','.',$MediaAD) + str_replace(',','.',$MediaCD));
                $DC_D = 1.11200000 - (0.00043499*($P7D) + 0.00000055*($P7D*$P7D)) - (0.0002882*($idade));

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }elseif($Protocolo == "D4D"){
                $DC_D = 1.1765 - 0.0744 * log10($MediaTD + $MediaSD + $MediaBD + $MediaSID);

                $this->DC_D = $DC_D;

                return number_format($DC_D,6,',','');
            }
            
            return false;
        }

        return false;
    }

    // Porcentual de Gordura
    public function PGResultado($DC_D,$sexo,$idade)
    {
        // Densidade Corporal
        if($DC_D == NULL){
            return false;
        }else{
            $DC_D = str_replace(',','.',$DC_D);
        }

        if($sexo == "feminino"){
            if($idade <= 8){
                $PG = ((5.43/$DC_D)-5.03)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 10){
                $PG = ((5.35/$DC_D)-4.95)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 12){
                $PG = ((5.25/$DC_D)-4.84)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 14){
                $PG = ((5.12/$DC_D)-4.69)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 16){
                $PG = ((5.07/$DC_D)-4.64)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 19){
                $PG = ((5.05/$DC_D)-4.62)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 50){
                $PG = ((5.03/$DC_D)-4.59)*100; // Formula
                return number_format($PG,2,',','');
            }

            return false;
        }elseif($sexo == "masculino"){
            if($idade <= 8){
                $PG = ((5.38/$DC_D)-4.97)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 10){
                $PG = ((5.30/$DC_D)-4.89)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 12){
                $PG = ((5.23/$DC_D)-4.81)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 14){
                $PG = ((5.07/$DC_D)-4.64)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 16){
                $PG = ((5.03/$DC_D)-4.59)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 19){
                $PG = ((4.98/$DC_D)-4.53)*100; // Formula
                return number_format($PG,2,',','');
            }elseif($idade <= 50){
                $PG = ((4.95/$DC_D)-4.50)*100; // Formula
                return number_format($PG,2,',','');
            }
            
            return false;
        }
        
        return false;
    }

    // Tabela de perigo para o Porcentual de Gordura
    public function PPGResultado($PG,$sexo,$idade)
    {
        $PG = str_replace(',','.',$PG);

        if($sexo == "feminino"){ // Feminino
            // Tabela por idade
            if($idade >= 18 & $idade <=25){
                // Tabela em porcentagem
                if($PG <= 13){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 13 & $PG <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 17 & $PG <= 19){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 20 & $PG <= 22){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 23 & $PG <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 26 & $PG <= 28){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 29 & $PG <= 31){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 31){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 26 & $idade <=35){
                // Tabela em porcentagem
                if($PG <= 14){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 14 & $PG <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 17 & $PG <= 20){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 21 & $PG <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 24 & $PG <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 26 & $PG <= 29){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 30 & $PG <= 33){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 33){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 36 & $idade <=45){
                // Tabela em porcentagem
                if($PG <= 16){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 16 & $PG <= 19){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 20 & $PG <= 23){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 24 & $PG <= 26){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 27 & $PG <= 30){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 30 & $PG <= 32){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 33 & $PG <= 36){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 36){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 46 & $idade <=55){
                // Tabela em porcentagem
                if($PG <= 17){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 17 & $PG <= 21){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 22 & $PG <= 25){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 26 & $PG <= 28){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 29 & $PG <= 31){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 32 & $PG <= 34){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 35 & $PG <= 38){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 38){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 56 & $idade <=65){
                // Tabela em porcentagem
                if($PG <= 18){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 18 & $PG <= 22){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 23 & $PG <= 26){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 27 & $PG <= 29){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 30 & $PG <= 32){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 33 & $PG <= 35){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 36 & $PG <= 38){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 38){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }
            return false;
        }elseif($sexo == "masculino"){ // Masculino
            // Tabela por idade
            if($idade >= 18 & $idade <=25){
                // Tabela em porcentagem
                if($PG <= 4){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 4 & $PG <= 6){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 7 & $PG <= 10){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 11 & $PG <= 13){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 14 & $PG <= 16){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 17 & $PG <= 20){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 21 & $PG <= 24){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 24){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 26 & $idade <=35){
                // Tabela em porcentagem
                if($PG <= 8){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 8 & $PG <= 11){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 12 & $PG <= 15){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 16 & $PG <= 18){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 19 & $PG <= 20){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 21 & $PG <= 24){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 25 & $PG <= 27){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 27){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 36 & $idade <=45){
                // Tabela em porcentagem
                if($PG <= 10){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 10 & $PG <= 14){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 15 & $PG <= 18){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 19 & $PG <= 21){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 22 & $PG <= 23){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 24 & $PG <= 25){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 26 & $PG <= 29){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 29){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 46 & $idade <=55){
                // Tabela em porcentagem
                if($PG <= 12){
                    return "<span class='text-red'>Muito Baixo</span>";
                }elseif($PG >= 12 & $PG <= 16){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 17 & $PG <= 20){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 21 & $PG <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 24 & $PG <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 26 & $PG <= 27){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 28 & $PG <= 30){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 30){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 56 & $idade <=65){
                // Tabela em porcentagem
                if($PG <= 13){
                    return "<span class='text-yellow'>Muito Baixo</span>";
                }elseif($PG >= 13 & $PG <= 18){
                    return "<span class='text-green'>Excelente</span>";
                }elseif($PG >= 19 & $PG <= 21){
                    return "<span class='text-aqua'>Muito Bom</span>";
                }elseif($PG >= 22 & $PG <= 23){
                    return "<span class='text-aqua'>Bom</span>";
                }elseif($PG >= 24 & $PG <= 25){
                    return "<span class='text-light-blue'>Adequado</span>";
                }elseif($PG >= 26 & $PG <= 27){
                    return "<span class='text-yellow'>Moderadamente Alto</span>";
                }elseif($PG >= 28 & $PG <= 30){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($PG >= 30){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }
            return false;
        }

        return false;
    }

    // Resultado do IMC
    public function IMCResultado($altura,$peso)
    {
        $altura = str_replace(',','.',$altura);
        $peso = str_replace(',','.',$peso);
        $IMC = $peso / ($altura * $altura);

        $this->IMC = $IMC;

        return number_format($IMC,1,',','');
    }

    // Tabela do IMC
    public function IMCTResultado($IMC)
    {
        $IMC = str_replace(',','.',$IMC);

        if($IMC <= 18.5){
            return "<span class='text-red'>Magreza</span>";
        }elseif($IMC >= 18.5 & $IMC <= 24.9){
            return "<span class='text-green'>Saudável</span>";
        }elseif($IMC >= 25 & $IMC <= 29.9){
            return "<span class='text-yellow'>Sobrepeso</span>";
        }elseif($IMC >= 30 & $IMC <= 34.9){
            return "<span class='text-red'>Obesidade Grau I</span>";
        }elseif($IMC >= 35 & $IMC <= 39.9){
            return "<span class='text-red'>Obesidade Grau II (Severa)</span>";
        }elseif($IMC >= 40){
            return "<span class='text-red'>Obesidade Grau III (Morbida)</span>";
        }

        return false;
    }

    // Resultado RCQ
    public function RCQResultado($abdome_c,$quadril)
    {
        $abdome_c = str_replace(',','.',$abdome_c);
        $quadril = str_replace(',','.',$quadril);

        $RCQ = $abdome_c/$quadril;

        return number_format($RCQ,2,',','');
    }

    // Tabela do RCQ
    public function RCQTResultado($RCQ,$sexo,$idade)
    {
        $RCQ = str_replace(',','.',$RCQ);

        if($sexo == "feminino"){
            if($idade >= 20 & $idade <= 29){
                if($RCQ <= 0.69){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.70 & $RCQ <= 0.77){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.78 & $RCQ <= 0.82){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.82){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 30 & $idade <= 39){
                if($RCQ <= 0.70){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.71 & $RCQ <= 0.78){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.79 & $RCQ <= 0.84){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.84){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 40 & $idade <= 49){
                if($RCQ <= 0.72){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.73 & $RCQ <= 0.79){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.80 & $RCQ <= 0.87){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.87){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 50 & $idade <= 59){
                if($RCQ <= 0.73){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.74 & $RCQ <= 0.81){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.82 & $RCQ <= 0.88){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.88){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 60 & $idade <= 69){
                if($RCQ <= 0.75){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.76 & $RCQ <= 0.83){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.84 & $RCQ <= 0.90){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.90){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }

            return false;
        }elseif($sexo == "masculino"){
            if($idade >= 20 & $idade <= 29){
                if($RCQ <= 0.82){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.83 & $RCQ <= 0.88){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.89 & $RCQ <= 0.94){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.94){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 30 & $idade <= 39){
                if($RCQ <= 0.83){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.84 & $RCQ <= 0.91){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.92 & $RCQ <= 0.96){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 0.96){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 40 & $idade <= 49){
                if($RCQ <= 0.87){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.88 & $RCQ <= 0.95){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.96 & $RCQ <= 1.00){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 1.00){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 50 & $idade <= 59){
                if($RCQ <= 0.89){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.90 & $RCQ <= 0.96){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.97 & $RCQ <= 1.02){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 1.02){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }elseif($idade >= 60 & $idade <= 69){
                if($RCQ <= 0.90){
                    return "<span class='text-yellow'>Baixo</span>";
                }elseif($RCQ >= 0.91 & $RCQ <= 0.98){
                    return "<span class='text-aqua'>Moderado</span>";
                }elseif($RCQ >= 0.99 & $RCQ <= 1.03){
                    return "<span class='text-yellow'>Alto</span>";
                }elseif($RCQ >= 1.03){
                    return "<span class='text-red'>Muito Alto</span>";
                }
            }

            return false;
        }

        return false;
    }
}

// Tabela de %G Corporal
class PorcentualGordura
{
    // Porcentual Ideal
    public function PGIdeal($PG,$sexo,$idade)
    {  
        if(!$PG){
            return false;
        }else{
            if($sexo == "feminino"){
                if($idade <= 30){
                    return 16;
                }elseif($idade >= 30 & $idade <= 39){
                    return 18;
                }elseif($idade >= 40 & $idade <= 49){
                    return 18.5;
                }elseif($idade >= 50 & $idade <= 59){
                    return 21.5;
                }elseif($idade >= 60){
                    return 22.5;
                }
    
                return false;
            }elseif($sexo == "masculino"){
                if($idade <= 30){
                    return 9;
                }elseif($idade >= 30 & $idade <= 39){
                    return 12.5;
                }elseif($idade >= 40 & $idade <= 49){
                    return 15;
                }elseif($idade >= 50 & $idade <= 59){
                    return 16.5;
                }elseif($idade >= 60){
                    return 16.5;
                }
    
                return false;
            }
        }

        return false;
    }

    // Porcentual Aceitavel
    public function PGAceitavel($PG,$sexo,$idade)
    {  
        if(!$PG){
            return false;
        }else{
            if($sexo == "feminino"){
                if($idade <= 30){
                    return 18;
                }elseif($idade >= 30 & $idade <= 39){
                    return 20;
                }elseif($idade >= 40 & $idade <= 49){
                    return 23.5;
                }elseif($idade >= 50 & $idade <= 59){
                    return 26.5;
                }elseif($idade >= 60){
                    return 27.5;
                }
    
                return false;
            }elseif($sexo == "masculino"){
                if($idade <= 30){
                    return 13;
                }elseif($idade >= 30 & $idade <= 39){
                    return 16.5;
                }elseif($idade >= 40 & $idade <= 49){
                    return 19;
                }elseif($idade >= 50 & $idade <= 59){
                    return 20.5;
                }elseif($idade >= 60){
                    return 20.5;
                }
    
                return false;
            }
        }

        return false;
    }
}