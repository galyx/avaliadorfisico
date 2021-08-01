<?php

namespace App\Models\Entidades;

class TesteResultado
{
    // Chart %G Corporal Bioimpedancia
    private $chartgcbideal_teste;
    private $chartgcbaceitavel_teste;

    public function getChartGCBIdealTeste()
    {
        return $this->chartgcbideal_teste;
    }
    public function setChartGCBIdealTeste($chartgcbideal_teste)
    {
        $this->chartgcbideal_teste = $chartgcbideal_teste;
    }

    public function getChartGCBAceitavelTeste()
    {
        return $this->chartgcbaceitavel_teste;
    }
    public function setChartGCBAceitavelTeste($chartgcbaceitavel_teste)
    {
        $this->chartgcbaceitavel_teste = $chartgcbaceitavel_teste;
    }

    // Chart %G Corporal Dobras Cutâneas
    private $chartgcdcideal_teste;
    private $chartgcdcaceitavel_teste;

    public function getChartGCDCIdealTeste()
    {
        return $this->chartgcdcideal_teste;
    }
    public function setChartGCDCIdealTeste($chartgcdcideal_teste)
    {
        $this->chartgcdcideal_teste = $chartgcdcideal_teste;
    }

    public function getChartGCDCAceitavelTeste()
    {
        return $this->chartgcdcaceitavel_teste;
    }
    public function setChartGCDCAceitavelTeste($chartgcdcaceitavel_teste)
    {
        $this->chartgcdcaceitavel_teste = $chartgcdcaceitavel_teste;
    }

    // Chart Composição Corporal
    private $chartccminimo_teste;
    private $chartccmaximo_teste;

    public function getChartCCMinimoTeste()
    {
        return $this->chartccminimo_teste;
    }
    public function setChartCCMinimoTeste($chartccminimo_teste)
    {
        $this->chartccminimo_teste = $chartccminimo_teste;
    }

    public function getChartCCMaximoTeste()
    {
        return $this->chartccmaximo_teste;
    }
    public function setChartCCMaximoTeste($chartccmaximo_teste)
    {
        $this->chartccmaximo_teste = $chartccmaximo_teste;
    }

    // Resultado dos Protocolos
    private $dc_teste;
    private $Pg_teste;
    private $pPg_teste;
    private $imc_teste;
    private $imct_teste;
    private $rcq_teste;
    private $rcqt_teste;

    public function getDCTeste()
    {
        return $this->dc_teste;
    }
    public function setDCTeste($dc_teste)
    {
        $this->dc_teste = $dc_teste;
    }

    public function getPGTeste()
    {
        return $this->Pg_teste;
    }
    public function setPGTeste($Pg_teste)
    {
        $this->Pg_teste = $Pg_teste;
    }

    public function getPPGTeste()
    {
        return $this->pPg_teste;
    }
    public function setPPGTeste($pPg_teste)
    {
        $this->pPg_teste = $pPg_teste;
    }

    public function getIMCTeste()
    {
        return $this->imc_teste;
    }
    public function setIMCTeste($imc_teste)
    {
        $this->imc_teste = $imc_teste;
    }

    public function getIMCTTeste()
    {
        return $this->imct_teste;
    }
    public function setIMCTTeste($imct_teste)
    {
        $this->imct_teste = $imct_teste;
    }

    public function getRCQTeste()
    {
        return $this->rcq_teste;
    }
    public function setRCQTeste($rcq_teste)
    {
        $this->rcq_teste = $rcq_teste;
    }

    public function getRCQTTeste()
    {
        return $this->rcqt_teste;
    }
    public function setRCQTTeste($rcqt_teste)
    {
        $this->rcqt_teste = $rcqt_teste;
    }

    // Teste de Resistencia Muscular
    private $trm_a_teste;
    private $trm_f_teste;

    public function getTRMATeste()
    {
        return $this->trm_a_teste;
    }
    public function setTRMATeste($trm_a_teste)
    {
        $this->trm_a_teste = $trm_a_teste;
    }

    public function getTRMFTeste()
    {
        return $this->trm_f_teste;
    }
    public function setTRMFTeste($trm_f_teste)
    {
        $this->trm_f_teste = $trm_f_teste;
    }

    // Bioimpedancia
    private $gcr_teste;
    private $mmr_teste;
    private $ar_teste;
    private $pr_teste;
    private $gvr_teste;

    public function getGCRTeste()
    {
        return $this->gcr_teste;
    }
    public function setGCRTeste($gcr_teste)
    {
        $this->gcr_teste = $gcr_teste;
    }

    public function getMMRTeste()
    {
        return $this->mmr_teste;
    }
    public function setMMRTeste($mmr_teste)
    {
        $this->mmr_teste = $mmr_teste;
    }

    public function getARTeste()
    {
        return $this->ar_teste;
    }
    public function setARTeste($ar_teste)
    {
        $this->ar_teste = $ar_teste;
    }

    public function getPRTeste()
    {
        return $this->pr_teste;
    }
    public function setPRTeste($pr_teste)
    {
        $this->pr_teste = $pr_teste;
    }

    public function getGVRTeste()
    {
        return $this->gvr_teste;
    }
    public function setGVRTeste($gvr_teste)
    {
        $this->gvr_teste = $gvr_teste;
    }
}