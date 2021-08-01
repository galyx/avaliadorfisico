    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Preencher Ficha Nova</h1>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- form start -->
                    <form action="http://<?php echo APP_HOST; ?>/aluno/salvarficha" method="post" id="form_ficha" role="form" required>
                        <!-- form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dados do Aluno</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <td class="info">Codigo do Aluno</td>
                                            <td class="info">Nome do Aluno</td>
                                            <td class="info">Ficha Nº</td>
                                            <td class="info">Idade do Aluno</td>
                                        </tr>

                                        <tr>
                                            <?php foreach($viewVar['dadosAluno'] as $dados_aluno){ ?>
                                            
                                                <td><?php echo $dados_aluno->getCodigoAluno(); ?></td>
                                                <td><?php echo $dados_aluno->getNomeAluno(); ?></td>
                                            
                                                <!-- Input HIDDEN aluno -->
                                                <input type="hidden" name="codigoaluno" value="<?php echo $dados_aluno->getCodigoAluno(); ?>">
                                                <!-- /.Input HIDDEN aluno -->
                                            <?php } ?>
                                            <td><?php echo $viewVar['numeroFicha']+1;?></td>
                                            <td><?php echo $viewVar['idade']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.tabela -->

                                <!-- Input HIDDEN numero da ficha -->
                                <input type="hidden" name="numeroficha" value="<?php echo $viewVar['numeroFicha']+1; ?>">
                                <!-- ./Fecha input HIDDEN numero da ficha -->
                                <!-- Input HIDDEN da data de aniversario -->
                                <input type="hidden" name="idade" class="idade" value="<?php echo $viewVar['idade']; ?>">
                                <!-- ./Fecha data -->
                                
                                <div class="form-group col-sm-3">
                                    <label for="dataficha">Data da Ficha</label>
                                    <input type="text" name="dataficha" class="form-control data" data-mask data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Data da Ficha">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="objetivo">Objetivo</label>
                                    <input type="text" name="objetivo" class="form-control" placeholder="Qual o Objetivo">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="observacao">Observação</label>
                                    <input type="text" name="observacao" class="form-control" placeholder="Alguma Observação">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="altura">Altura</label>
                                    <input type="text" name="altura" class="form-control BR" placeholder="Altura do Aluno">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="peso">Peso</label>
                                    <input type="text" name="peso" class="form-control doisN" id="peso" placeholder="Peso do Aluno">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control select2" name="sexo">
                                        <option value="">Selecione o sexo</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                    </select>
                                </div>
                                <!-- ./Fecha Ficha 01 -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box-body-primary -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Perimetria</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group col-sm-4">
                                    <label for="pescoco">Pescoço</label>
                                    <input type="text" name="pescoco" class="form-control doisN" placeholder="Medidas do Pescoço">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="deltoides">Deltoides</label>
                                    <input type="text" name="deltoides" class="form-control doisN" placeholder="Medidas do Deltoides">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="torax">Tórax</label>
                                    <input type="text" name="torax" class="form-control doisN" placeholder="Medidas do Torax">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="abdomeC">Abdome C</label>
                                    <input type="text" name="abdomeC" class="form-control doisN" placeholder="Medidas do Abdome C">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="abdomeM">Abdome M</label>
                                    <input type="text" name="abdomeM" class="form-control doisN" placeholder="Medidas do Abdome M">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="quadril">Quadril</label>
                                    <input type="text" name="quadril" class="form-control doisN" placeholder="Medidas do Quadril">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <hr />
                            <div class="box-body">
                                <div class="form-group col-sm-5">
                                    <label for="bracoCD">Braço Contraído Direito</label>
                                    <input type="text" name="bracoCD" class="form-control doisN" placeholder="Medidas do Braço Contraido">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="bracoCE">Braço Contraído Esquerdo</label>
                                    <input type="text" name="bracoCE" class="form-control doisN" placeholder="Medidas do Braço Contraido">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="bracoRD">Braço Relaxado Direito</label>
                                    <input type="text" name="bracoRD" class="form-control doisN" placeholder="Medidas do Braço Relaxado">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="bracoRE">Braço Relaxado Esquerdo</label>
                                    <input type="text" name="bracoRE" class="form-control doisN" placeholder="Medidas do Braço Relaxado">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="antebracoD">Antebraço Direito</label>
                                    <input type="text" name="antebracoD" class="form-control doisN" placeholder="Medidas do Antebraço">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="antebracoE">Antebraço Esquerdo</label>
                                    <input type="text" name="antebracoE" class="form-control doisN" placeholder="Medidas do Antebraço">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="coxaPD">Coxa Proximal Direito</label>
                                    <input type="text" name="coxaPD" class="form-control doisN" placeholder="Medidas da Coxa Proximal">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="coxaPE">Coxa Proximal Esquerdo</label>
                                    <input type="text" name="coxaPE" class="form-control doisN" placeholder="Medidas da Coxa Proximal">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="coxaMD">Coxa Medial Direito</label>
                                    <input type="text" name="coxaMD" class="form-control doisN" placeholder="Medidas da Coxa Medial">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="coxaME">Coxa Medial Esquerdo</label>
                                    <input type="text" name="coxaME" class="form-control doisN" placeholder="Medidas da Coxa Medial">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="panturrilhaD">Panturrilha Direito</label>
                                    <input type="text" name="panturrilhaD" class="form-control doisN" placeholder="Medidas da Panturrilha">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="panturrilhaE">Panturilha Esquerdo</label>
                                    <input type="text" name="panturrilhaE" class="form-control doisN" placeholder="Medidas da Panturrilha">
                                </div>
                            </div> 
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box-body-primary -->
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="checkbox" name="check_protocolo" id="check-protocolo" checked>
                                    <label>Usar Protocolos e Biometria? <i class="icon fa fa-warning"></i></label>
                                </div>
                            </div>
                            <div id="alert-protocolo"></div>
                        </div>
                        <!-- /.box-body-info -->
                        <div class="box box-primary" id="protocolos">
                            <div class="box-header with-border">
                                <h3 class="box-title">Protocolos</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="protocoloDC">Dobras Cutâneas</label>
                                    <select class="form-control vazio" name="protocoloDC">
                                        <option value="">Selecione o Protocolo de Dobras Cutâneas</option>
                                        <option value="P3D">Pollock 3 Dobras</option>
                                        <option value="P7D">Pollock 7 Dobras</option>
                                        <option value="D4D">Durinn 4 Dobras</option>
                                    </select>
                                </div>
                            </div> 
                            <!-- /.box-body -->
                            <hr />
                            <div class="box-header with-border">
                                <h3 class="box-title">Biometria - Dobras Cutâneas</h3>
                            </div>
                            <div class="box-body" id="biometria_media">
                                <div class="form-group col-sm-3">
                                    <label for="bicipitalD1">Bicipital Direito 1</label>
                                    <input type="text" name="bicipitalD1" class="form-control BD doisN vazio" placeholder="Medidas do Bicipital">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="bicipitalD2">Bicipital Direito 2</label>
                                    <input type="text" name="bicipitalD2" class="form-control BD doisN" placeholder="Medidas do Bicipital">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaBD">Media</label>
                                    <input type="text" class="form-control BDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaBD" class="BDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="bicipitalEU">Bicipital Esquerda unica</label>
                                    <input type="text" name="bicipitalEU" class="form-control doisN vazio" placeholder="Medidas do Bicipital">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="tricipitalD1">tricipital Direito 1</label>
                                    <input type="text" name="tricipitalD1" class="form-control TD doisN vazio" placeholder="Medidas do Tricipital">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="tricipitalD2">tricipital Direito 2</label>
                                    <input type="text" name="tricipitalD2" class="form-control TD doisN" placeholder="Medidas do Tricipital">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaTD">Media</label>
                                    <input type="text" class="form-control TDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaTD" class="TDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="tricipitalEU">tricipital Esquerda unica</label>
                                    <input type="text" name="tricipitalEU" class="form-control doisN vazio" placeholder="Medidas do Tricipital">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="toracicaD1">Torácica Direito 1</label>
                                    <input type="text" name="toracicaD1" class="form-control T_D doisN vazio" placeholder="Medidas do Toracica">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="toracicaD2">Torácica Direito 2</label>
                                    <input type="text" name="toracicaD2" class="form-control T_D doisN" placeholder="Medidas do Toracica">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaT_D">Media</label>
                                    <input type="text" class="form-control T_DM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaT_D" class="T_DM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="toracicaEU">Torácica Esquerda unica</label>
                                    <input type="text" name="toracicaEU" class="form-control doisN vazio" placeholder="Medidas do Toracica">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="subescapularD1">Subescapular Direito 1</label>
                                    <input type="text" name="subescapularD1" class="form-control SD doisN vazio" placeholder="Medidas do Subescapular">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="subescapularD2">Subescapular Direito 2</label>
                                    <input type="text" name="subescapularD2" class="form-control SD doisN" placeholder="Medidas do Subescapular">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaSD">Media</label>
                                    <input type="text" class="form-control SDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaSD" class="SDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="subescapularEU">Subescapular Esquerda unica</label>
                                    <input type="text" name="subescapularEU" class="form-control doisN vazio" placeholder="Medidas do Subescapular">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="axiliarmediaD1">Axiliar Média Direito 1</label>
                                    <input type="text" name="axiliarmediaD1" class="form-control AMD doisN vazio" placeholder="Medidas do Axiliar Média">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="axiliarmediaD2">Axiliar Média Direito 2</label>
                                    <input type="text" name="axiliarmediaD2" class="form-control AMD doisN" placeholder="Medidas do Axiliar Média">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaAMD">Media</label>
                                    <input type="text" class="form-control AMDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaAMD" class="AMDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="axiliarmediaEU">Axiliar Média Esquerda unica</label>
                                    <input type="text" name="axiliarmediaEU" class="form-control doisN vazio" placeholder="Medidas do Axiliar Média">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="suprailiacaD1">Supra Ilíaca Direito 1</label>
                                    <input type="text" name="suprailiacaD1" class="form-control SID doisN vazio" placeholder="Medidas do Supra Ilíaca">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="suprailiacaD2">Supra Ilíaca Direito 2</label>
                                    <input type="text" name="suprailiacaD2" class="form-control SID doisN" placeholder="Medidas do Supra Ilíaca">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaSID">Media</label>
                                    <input type="text" class="form-control SIDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaSID" class="SIDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="suprailiacaEU">Supra Ilíaca Esquerda unica</label>
                                    <input type="text" name="suprailiacaEU" class="form-control doisN vazio" placeholder="Medidas do Supra Ilíaca">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="abdominalD1">Abdominal Direito 1</label>
                                    <input type="text" name="abdominalD1" class="form-control AD doisN vazio" placeholder="Medidas do Abdominal">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="abdominalD2">Abdominal Direito 2</label>
                                    <input type="text" name="abdominalD2" class="form-control AD doisN" placeholder="Medidas do Abdominal">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaAD">Media</label>
                                    <input type="text" class="form-control ADM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaAD" class="ADM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="abdominalEU">Abdominal Esquerda unica</label>
                                    <input type="text" name="abdominalEU" class="form-control doisN vazio" placeholder="Medidas da Abdominal">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="coxaD1">Coxa Direito 1</label>
                                    <input type="text" name="coxaD1" class="form-control CD doisN vazio" placeholder="Medidas da Coxa">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="coxaD2">Coxa Direito 2</label>
                                    <input type="text" name="coxaD2" class="form-control CD doisN" placeholder="Medidas da Coxa">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaCD">Media</label>
                                    <input type="text" class="form-control CDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaCD" class="CDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="coxaEU">Coxa Esquerda unica</label>
                                    <input type="text" name="coxaEU" class="form-control doisN vazio" placeholder="Medidas da Coxa">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="panturrilhamedialD1">Panturrilha Medial Direito 1</label>
                                    <input type="text" name="panturrilhamedialD1" class="form-control PMD doisN vazio" placeholder="Medidas da Panturrilha Medial">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="panturrilhamedialD2">Panturrilha Medial Direito 2</label>
                                    <input type="text" name="panturrilhamedialD2" class="form-control PMD doisN" placeholder="Medidas da Panturrilha Medial">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="mediaPMD">Media</label>
                                    <input type="text" class="form-control PMDM" placeholder="Media" disabled>
                                    <input type="hidden" name="mediaPMD" class="PMDM">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="panturrilhamedialEU">Panturrilha Medial Esquerda unica</label>
                                    <input type="text" name="panturrilhamedialEU" class="form-control doisN vazio" placeholder="Medidas da Panturrilha Medial">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box-body-primary -->
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="checkbox" name="check_bioimpedancia" id="check-bioimpedancia" checked>
                                    <label>Usar Bioimpedância? <i class="icon fa fa-warning"></i></label>
                                </div>
                            </div>
                            <div id="alert-bioimpedancia"></div>
                        </div>
                        <!-- /.box-body-info -->
                        <div class="box box-primary" id="bioimpedancias">
                            <div class="box-header with-border">
                                <h3 class="box-title">Bioimpedância</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group col-sm-4">
                                    <label for="gorduracorporal">Gordura Corporal</label>
                                    <div class="input-group">
                                        <input type="text" name="gorduracorporal" class="form-control doisN vazio" placeholder="Porcentagem da Gordural Corporal">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="massamuscular">Massa Muscular</label>
                                    <div class="input-group">
                                        <input type="text" name="massamuscular" class="form-control doisN vazio" placeholder="Porcentagem da Massa Muscular">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="agua">Água</label>
                                    <div class="input-group">
                                        <input type="text" name="agua" class="form-control doisN vazio" placeholder="Porcentagem de Água">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="proteina">Proteína</label>
                                    <div class="input-group">
                                        <input type="text" name="proteina" class="form-control doisN vazio" placeholder="Porcentagem da Proteína">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="gorduravisceral">Gordura Visceral</label>
                                    <input type="text" name="gorduravisceral" class="form-control vazio" placeholder="Gordura viceral">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="massaossea_p">Massa Óssea(%)</label>
                                    <div class="input-group">
                                        <input type="text" name="massaossea_p" id="massaossea_p" class="form-control doisN vazio" placeholder="Porcentagem da Massa Osséa">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="massaossea_kg">Massa Óssea(Kg)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control massaossea_kg" placeholder="Massa Óssea Kg" disabled>
                                        <input type="hidden" name="massaossea_kg" class="massaossea_kg">
                                        <span class="input-group-addon">Kg</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="idadecorporal">Idade Corporal</label>
                                    <input type="text" name="idadecorporal" class="form-control vazio" placeholder="Idade Corporal">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="taxametabolismo">Taxa de Metabolismo</label>
                                    <input type="text" name="taxametabolismo" class="form-control vazio" placeholder="Taxa de Metabolismo">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box-body-primary -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Teste de Resistencia Muscular</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group col-sm-7">
                                    <label for="abdomen">Abdomen</label>
                                    <div class="input-group">
                                        <input type="text" name="abdomen" class="form-control" placeholder="Teste de Abdomen">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="abdomencheck">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-7">
                                    <label for="flexao">Flexão</label>
                                    <div class="input-group">
                                        <input type="text" name="flexao" class="form-control" placeholder="Teste de Flexão">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="flexaocheck">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary saveficha">Salvar</button>
                            </div>
                        </div>
                        <!-- /.box-body-primary -->
                    </form>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>