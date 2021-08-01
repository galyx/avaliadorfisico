<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Ficha de Avaliação Fisica</h1>
    </section>
    <!-- Main Content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box-header">
                                <h3 class="box-title">Ficha Selecionada</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="http://<?php echo APP_HOST; ?>/aluno/selecionarficha" method="get" class="form-inline">
                                    <input type="hidden" name="codigoAluno" value="<?php echo $viewVar['codigoAluno']; ?>">
                                    <!-- ?.Codigo Aluno -->
                                    <div class="form-group">
                                        <select name="numeroFicha" class="form-control" onchange="this.form.submit()">
                                            <?php foreach($viewVar['ficha'] as $fichaN){ ?>
                                                <option value="<?php echo $fichaN->getNumeroFicha(); ?>" <?php echo ($viewVar['numeroFicha'] == $fichaN->getNumeroFicha()) ? "selected" : ""; ?>>Ficha de Avaliação Fisica Nª<?php echo $fichaN->getNumeroFicha(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.Ficha selecionada -->
                        <div class="col-sm-6">
                            <div class="box-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2" class="info">Muito Alto</td>
                                        <td colspan="2" class="info">Alto</td>
                                        <td class="info">Padrão</td>
                                        <td colspan="2" class="info">Baixo</td>
                                        <td colspan="2" class="info">Muito Baixo</td>
                                    </tr>
                                    <tr>
                                        <td class="text-red"><i class="fa fa-circle"></i> Ruim</td>
                                        <td class="text-light-blue"><i class="fa fa-circle"></i> Bom</td>
                                        <td class="text-yellow"><i class="fa fa-circle"></i>Ruim</td>
                                        <td class="text-aqua"><i class="fa fa-circle"></i> Bom</td>
                                        <td class="text-green"><i class="fa fa-circle"></i> Normal</td>
                                        <td class="text-aqua"><i class="fa fa-circle"></i> Bom</td>
                                        <td class="text-yellow"><i class="fa fa-circle"></i> Ruim</td>
                                        <td class="text-light-blue"><i class="fa fa-circle"></i> Bom</td>
                                        <td class="text-red"><i class="fa fa-circle"></i> Ruim</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.Select Ficha -->
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados do Aluno</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped">
                            <!-- Dados Aluno -->
                            <?php foreach($viewVar['dados_aluno'] as $aluno){ ?>
                                <tr>
                                    <th>Codigo do Aluno</td>
                                    <td class="text-red"><?=$aluno->getCodigoAluno()?></td>
                                </tr>
                                <tr>
                                    <th>Nome do Aluno</td>
                                    <td class="text-red"><?=$aluno->getNomeAluno()?></td>
                                </tr>
                                <tr>
                                    <th>Data de Nascimento</td>
                                    <td class="text-red"><?=date("d/m/Y", strtotime(str_replace("-","/",$aluno->getDataNascimento())))?></td>
                                </tr>
                            <?php } ?>
                            <!-- /.Dados Aluno -->
                            <?php foreach($viewVar['dadosFicha'] as $fichaD){ ?>
                                <tr>
                                    <th>Idade do Aluno</td>
                                    <td class="text-red"><?=$fichaD->getIdade()?></td>
                                </tr>
                                <tr>
                                    <th>Data da Ficha</td>
                                    <td class="text-red"><?=date("d/m/Y",strtotime(str_replace("-","/",$fichaD->getDataFicha())))?></td>
                                </tr>
                                <tr>
                                    <th>Objetivo</td>
                                    <td><?=$fichaD->getObjetivo()==""?"<span class='text-aqua'>Sem Objetivo!</span>":"<span class='text-red'>".$fichaD->getObjetivo()."</span>"?></td>
                                </tr>
                                <tr>
                                    <th>Observação</td>
                                    <td><?=$fichaD->getObservacao()==""?"<span class='text-aqua'>Sem Observação!</span>":"<span class='text-red'>".$fichaD->getObservacao()."</span>"?></td>
                                </tr>
                                <tr>
                                    <th>Altura</td>
                                    <td class="text-red"><?=$fichaD->getAltura()?></td>
                                </tr>
                                <tr>
                                    <th>Peso</td>
                                    <td class="text-red" id="pesochartcca"><?=$fichaD->getPeso()?></td>
                                </tr>
                                <tr>
                                    <th>Sexo</td>
                                    <td class="text-red"><?=$fichaD->getSexo()=="masculino"?"Masculino <i class='fa fa-mars'></i>":"Feminino <i class='fa fa-venus'></i>"?></td>
                                </tr>
                            <?php } ?>
                            <!-- /.Dados Ficha -->
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perimetria</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <!-- Dados da Perimetria -->
                        <table class="table table-striped">
                            <?php foreach($viewVar['perimetria'] as $perimetria){ ?>
                                <tr>
                                    <th>Pescoço</td>
                                    <td class="text-red"><?=$perimetria->getPescoco()?></td>

                                    <th>Abdome C</td>
                                    <td class="text-red"><?=$perimetria->getAbdomeC()?></td>
                                </tr>
                                <tr>
                                    <th>Deltoides</td>
                                    <td class="text-red"><?=$perimetria->getDeltoides()?></td>

                                    <th>Abdome M</td>
                                    <td class="text-red"><?=$perimetria->getAbdomeM()?></td>
                                </tr>
                                <tr>
                                    <th>Tórax</td>
                                    <td class="text-red"><?=$perimetria->getTorax()?></td>

                                    <th>Quadril</td>
                                    <td class="text-red"><?=$perimetria->getQuadril()?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <!-- /.Dados da Perimetria -->
                        <hr />
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Direita</th>
                                <th>Esquerda</th>
                            </tr>
                            <?php foreach($viewVar['direita_esquerda'] as $DE){ ?>
                                <tr>
                                    <th>Braço Contraído</td>
                                    <td class="text-red"><?=$DE->getBracoCD()?></td>
                                    <td class="text-red"><?=$DE->getBracoCE()?></td>
                                </tr>
                                <tr>
                                    <th>Braço Relaxado</td>
                                    <td class="text-red"><?=$DE->getBracoRD()?></td>
                                    <td class="text-red"><?=$DE->getBracoRE()?></td>
                                </tr>
                                <tr>
                                    <th>Antebraço</td>
                                    <td class="text-red"><?=$DE->getAntebracoD()?></td>
                                    <td class="text-red"><?=$DE->getAntebracoE()?></td>
                                </tr>
                                <tr>
                                    <th>Coxa Proximal</td>
                                    <td class="text-red"><?=$DE->getCoxaPD()?></td>
                                    <td class="text-red"><?=$DE->getCoxaPE()?></td>
                                </tr>
                                <tr>
                                    <th>Coxa Medial</td>
                                    <td class="text-red"><?=$DE->getCoxaMD()?></td>
                                    <td class="text-red"><?=$DE->getCoxaME()?></td>
                                </tr>
                                <tr>
                                    <th>Panturrilha</td>
                                    <td class="text-red"><?=$DE->getPanturrilhaD()?></td>
                                    <td class="text-red"><?=$DE->getPanturrilhaE()?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <!-- /.Direita-Esquerda -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Teste de Resistencia Muscular</h3>
                    </div>
                    <!-- /.box-title -->
                    <div class="box-body table-responsive">
                        <!-- Teste de Resistencia Muscular -->
                        <?php foreach($viewVar['teste_resistencia_muscular'] as $TRM){ ?>
                            <table class="table table-striped">
                                <?php foreach($viewVar['TesteResistenciaMuscularResultado'] as $TRMT){ ?>
                                <tr>
                                    <th>Abdominal</th>
                                    <?php if($TRM->getAbdomenCheck() == NULL){ ?>
                                        <td colspan="2">Sem Teste de Abdominal</td>
                                    <?php }else{ ?>
                                        <td class="text-red"><?=$TRM->getAbdomen()?></td>
                                        <td><?=$TRMT->getTRMATeste()?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th>Flexão</th>
                                    <?php if($TRM->getFlexaoCheck() == NULL){ ?>
                                        <td colspan="2">Sem Teste de Flexão</td>
                                    <?php }else{ ?>
                                        <td class="text-red"><?=$TRM->getFlexao()?></td>
                                        <td><?=$TRMT->getTRMFTeste()?></td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </table>
                        <?php } ?>
                        <!-- /.Teste de Resistencia Muscular -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
            </div>
            <!-- /.Dados Aluno /.Perimetria -->
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Protocolos</h3>
                    </div>
                    <!-- /.box-title -->
                    <div class="box-body table-responsive">
                        <!-- Protocolos -->
                        <?php if($viewVar['protocolo'] == NULL){ ?>
                            <div class="callout callout-info">
                                <h4>Sem Protocolos(Dobras Cutâneas & Biometrias)!</h4>

                                <p>Sistema não calculara sem os protocolos...</p>
                            </div>
                        <?php }else{ ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>Protocolos</td>
                                    <td class="text-red">
                                        <?=$viewVar['protocolo'] == "P3D"?"Pollock 3 Dobras":""?>
                                        <?=$viewVar['protocolo'] == "P7D"?"Pollock 7 Dobras":""?>
                                        <?=$viewVar['protocolo'] == "D4D"?"Durinn 4 Dobras":""?>
                                    </td>
                                </tr>
                            </table>
                            <div class="box-header with-border">
                                <h3 class="box-title">Biometrias - Dobras Cutâneas</h3>
                            </div>
                            <!-- /.box-title -->
                            <table class="table table-striped">
                                <tr>
                                    <th>Dobras</th>
                                    <th>Direita 1</th>
                                    <th>Direita 2</th>
                                    <th class="text-aqua">Media</th>
                                    <th>Esquerda Unica</th>
                                </tr>
                                <?php foreach($viewVar['bicipital'] as $bicipital){ ?>
                                    <tr>
                                        <th>Bicipital</th>
                                        <td class="text-red"><?=$bicipital->getBicipitalD1()?></td>
                                        <td class="text-red"><?=$bicipital->getBicipitalD2()==""?"0,0":$bicipital->getBicipitalD2()?></td>
                                        <td class="text-green"><?=$bicipital->getMediaBD()?></td>
                                        <td class="text-red"><?=$bicipital->getBicipitalEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['tricipital'] as $tricipital){ ?>
                                    <tr>
                                        <th>Tricipital</th>
                                        <td class="text-red"><?=$tricipital->getTricipitalD1()?></td>
                                        <td class="text-red"><?=$tricipital->getTricipitalD2()==""?"0,0":$tricipital->getTricipitalD2()?></td>
                                        <td class="text-green"><?=$tricipital->getMediaTD()?></td>
                                        <td class="text-red"><?=$tricipital->getTricipitalEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['toracica'] as $toracica){ ?>
                                    <tr>
                                        <th>Toracica</th>
                                        <td class="text-red"><?=$toracica->getToracicaD1()?></td>
                                        <td class="text-red"><?=$toracica->getToracicaD2()==""?"0,0":$toracica->getToracicaD2()?></td>
                                        <td class="text-green"><?=$toracica->getMediaT_D()?></td>
                                        <td class="text-red"><?=$toracica->getToracicaEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['subescapular'] as $subescapular){ ?>
                                    <tr>
                                        <th>Subescapular</th>
                                        <td class="text-red"><?=$subescapular->getSubescapularD1()?></td>
                                        <td class="text-red"><?=$subescapular->getSubescapularD2()==""?"0,0":$subescapular->getSubescapularD2()?></td>
                                        <td class="text-green"><?=$subescapular->getMediaSD()?></td>
                                        <td class="text-red"><?=$subescapular->getSubescapularEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['axiliar_media'] as $axiliar_media){ ?>
                                    <tr>
                                        <th>Axiliar Média</th>
                                        <td class="text-red"><?=$axiliar_media->getAxiliarMediaD1()?></td>
                                        <td class="text-red"><?=$axiliar_media->getAxiliarMediaD2()==""?"0,0":$axiliar_media->getAxiliarMediaD2()?></td>
                                        <td class="text-green"><?=$axiliar_media->getMediaAMD()?></td>
                                        <td class="text-red"><?=$axiliar_media->getAxiliarMediaEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['supra_iliaca'] as $supra_iliaca){ ?>
                                    <tr>
                                        <th>Supra Ilíaca</th>
                                        <td class="text-red"><?=$supra_iliaca->getSupraIliacaD1()?></td>
                                        <td class="text-red"><?=$supra_iliaca->getSupraIliacaD2()==""?"0,0":$supra_iliaca->getSupraIliacaD2()?></td>
                                        <td class="text-green"><?=$supra_iliaca->getMediaSID()?></td>
                                        <td class="text-red"><?=$supra_iliaca->getSupraIliacaEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['abdominal'] as $abdominal){ ?>
                                    <tr>
                                        <th>Abdominal</th>
                                        <td class="text-red"><?=$abdominal->getAbdominalD1()?></td>
                                        <td class="text-red"><?=$abdominal->getAbdominalD2()==""?"0,0":$abdominal->getAbdominalD2()?></td>
                                        <td class="text-green"><?=$abdominal->getMediaAD()?></td>
                                        <td class="text-red"><?=$abdominal->getAbdominalEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['coxa'] as $coxa){ ?>
                                    <tr>
                                        <th>Coxa</th>
                                        <td class="text-red"><?=$coxa->getCoxaD1()?></td>
                                        <td class="text-red"><?=$coxa->getCoxaD2()==""?"0,0":$coxa->getCoxaD2()?></td>
                                        <td class="text-green"><?=$coxa->getMediaCD()?></td>
                                        <td class="text-red"><?=$coxa->getCoxaEU()?></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($viewVar['panturrilha_medial'] as $panturrilha_medial){ ?>
                                    <tr>
                                        <th>Panturrilha Medial</th>
                                        <td class="text-red"><?=$panturrilha_medial->getPanturrilhaMedialD1()?></td>
                                        <td class="text-red"><?=$panturrilha_medial->getPanturrilhaMedialD2()==""?"0,0":$panturrilha_medial->getPanturrilhaMedialD2()?></td>
                                        <td class="text-green"><?=$panturrilha_medial->getMediaPMD()?></td>
                                        <td class="text-red"><?=$panturrilha_medial->getPanturrilhaMedialEU()?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        <?php } ?>
                        <!-- /.Protocolos -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bioimpedância</h3>
                    </div>
                    <!-- /.box-title -->
                    <div class="box-body table-responsive">
                        <!-- Bioimpedancia -->
                        <?php foreach($viewVar['bioimpedancia'] as $bioimpedancia){ ?>
                            <?php if($bioimpedancia->getIdadeCorporal() == NULL){ ?>
                                <div class="callout callout-info">
                                    <h4>Sem Dados da Bioimpedância!</h4>

                                    <p>Sistema não calculara sem os dados da Bioimpedância...</p>
                                </div>
                            <?php }else{ ?>
                                <table class="table table-striped">
                                    <?php foreach($viewVar['BioimpedanciaResultado'] as $BTR){ ?>
                                    <tr>
                                        <th>Gordura Corporal</th>
                                        <td class="text-red" id="chartgcba"><?=$bioimpedancia->getGorduraCorporal()?> %</td>
                                        <td><?=$BTR->getGCRTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>Massa Muscular</th>
                                        <td class="text-red"><?=$bioimpedancia->getMassaMuscular()?> %</td>
                                        <td><?=$BTR->getMMRTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>Água</th>
                                        <td class="text-red"><?=$bioimpedancia->getAgua()?> %</td>
                                        <td><?=$BTR->getARTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>Proteína</th>
                                        <td class="text-red"><?=$bioimpedancia->getProteina()?> %</td>
                                        <td><?=$BTR->getPRTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>Gordura Visceral</th>
                                        <td class="text-red"><?=$bioimpedancia->getGorduraVisceral()?></td>
                                        <td><?=$BTR->getGVRTeste()?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <hr />
                                <!-- Restante do sistema de bioimpedancia -->
                                <table class="table table-striped">
                                    <tr>
                                        <th>Massa Óssea(%)</th>
                                        <td class="text-red"><?=$bioimpedancia->getMassaOsseaP()?> %</td>
                                        <!-- ======== -->
                                        <th>Massa Óssea(Kg)</th>
                                        <td class="text-red"><?=$bioimpedancia->getMassaOsseaKG()?> Kg</td>
                                    </tr>
                                    <tr>
                                        <th>Idade Corporal</th>
                                        <td class="text-red"><?=$bioimpedancia->getIdadeCorporal()?></td>
                                        <!-- ======== -->
                                        <th>Taxa de Metabolismo</th>
                                        <td class="text-red"><?=$bioimpedancia->getTaxaMetabolismo()?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        <?php } ?>
                        <!-- /.Bioimpedancia -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultado</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <!-- Resultado -->
                        <?php if($viewVar['protocolo'] == NULL){ ?>
                            <div class="callout callout-warning">
                                <h4>Sem Protocolos(Dobra Cutâneas & Biometrias)!</h4>

                                <p>Sem dados para forja o resultado.</p>
                            </div>
                        <?php }else{ ?>
                            <table class="table table-striped">
                                <?php foreach($viewVar['Resultado'] as $Resultado){ ?>
                                    <tr>
                                        <th>
                                            <?=$viewVar['protocolo'] == "P3D"?"Pollock 3 Dobras":""?>
                                            <?=$viewVar['protocolo'] == "P7D"?"Pollock 7 Dobras":""?>
                                            <?=$viewVar['protocolo'] == "D4D"?"Durinn 4 Dobras":""?>
                                        </th>
                                        <th>Densidade Corporal</th>
                                        <td class="text-red"><?=$Resultado->getDCTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th><?=$fichaD->getSexo() == "feminino"?"%G Feminino <i class='fa fa-venus'></i>":"%G Masculino <i class='fa fa-mars'></i>"?></th>
                                        <td class="text-red" id="chartgcdca"><?=$Resultado->getPGTeste()?></td>
                                        <td><?=$Resultado->getPPGTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>IMC</th>
                                        <td class="text-red"><?=$Resultado->getIMCTeste()?></td>
                                        <td><?=$Resultado->getIMCTTeste()?></td>
                                    </tr>
                                    <tr>
                                        <th>RCQ</th>
                                        <td class="text-red"><?=$Resultado->getRCQTeste()?></td>
                                        <td><?=$Resultado->getRCQTTeste()?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        <?php } ?>
                        <!-- /.Resultado -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box box-primary -->
            </div>
            <!-- /.Protocolos--Biometrias-Dobras Cutaneas /.Bioimpedancia /.Resultado dos Protocolos -->
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box-header with-border">
                                <h3 class="box-title">Composição Corporal</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <!-- Peso ideal Minimo e Maximo -->
                                <?php foreach($viewVar['ChartCC'] as $chartcc){ ?>
                                    <input type="hidden" id="pesochartccmn" value="<?=$chartcc->getChartCCMinimoTeste()?>">
                                    <input type="hidden" id="pesochartccmx" value="<?=$chartcc->getChartCCMaximoTeste()?>">
                                <?php } ?>
                                <!-- /.Peso ideal Minimo e Maximo -->

                                <div id="bar-chartCC" style="height: 300px;"></div>
                                <!-- /.Chart -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.Composição Corporal -->
                        <div class="col-sm-6">
                            <div class="box-header with-border">
                                <h3 class="box-title">% Gordura Corporal Dobras Cutâneas</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php foreach($viewVar['ChartGCDC'] as $chartgcdc){ ?>
                                    <input type="hidden" id="chartgcdcideal" value="<?=$chartgcdc->getChartGCDCIdealTeste()?>">
                                    <input type="hidden" id="chartgcdcaceitavel" value="<?=$chartgcdc->getChartGCDCAceitavelTeste()?>">
                                <?php } ?>
                                <!-- /.Input Hidden -->

                                <div id="bar-chartGCDC" style="height: 300px;"></div>
                                <!-- /.Chart -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.% Gordura Corporal Dobras Cutâneas -->
                        <div class="col-sm-6">
                            <div class="box-header with-border">
                                <h3 class="box-title">% Gordura Corporal Bioimpedancia</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php foreach($viewVar['ChartGCB'] as $GCB){ ?>
                                    <input type="hidden" id="chartgcbideal" value="<?=$GCB->getChartGCBIdealTeste()?>">
                                    <input type="hidden" id="chartgcbaceitavel" value="<?=$GCB->getChartGCBAceitavelTeste()?>">
                                <?php } ?>
                                <!-- /.Input Hidden -->
                            
                                <div id="bar-chartGCB" style="height: 300px;"></div>
                                <!-- /.Chart -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.% Gordura Corporal Bioimpedancia -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box box-info -->
            </div>
            <!-- /.Graficos de ideal -->
        </div>
    </section>
</div>