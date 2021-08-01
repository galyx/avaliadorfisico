$(document).ready(function() {
    // ----
    $('.doisN').maskMoney({ decimal: ',', thousands: '', precision: 1});
    $('.BR').maskMoney({ decimal: ',', thousands: '', precision: 2});
    // --Medias do bicipital
    $("#biometria_media").on("keyup blur change", function(){
        var Mbicipital = 0;
        var bicipital = 0;
        var bilength = 0;
        $(".BD").each(function(){
            bicipital += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                bilength += $(this).length;
            }
            // -----
            if(bilength == 0){
                Mbicipital = bicipital / 2;
                $(".BDM").val(Mbicipital.toFixed(2).replace('.',','));
            }else if(bilength == 1){
                Mbicipital = bicipital / 1;
                $(".BDM").val(Mbicipital.toFixed(2).replace('.',','));
            }
        });
        // -----
        var Mtricipital = 0;
        var tricipital = 0;
        var trilength = 0;
        $(".TD").each(function(){
            tricipital += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                trilength += $(this).length;
            }
            // -----
            if(trilength == 0){
                Mtricipital = tricipital / 2;
                $(".TDM").val(Mtricipital.toFixed(2).replace('.',','));
            }else if(trilength == 1){
                Mtricipital = tricipital / 1;
                $(".TDM").val(Mtricipital.toFixed(2).replace('.',','));
            }
        });
        // -----
        var Mtoracica = 0;
        var toracica = 0;
        var tolength = 0;
        $(".T_D").each(function(){
            toracica += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                tolength += $(this).length;
            }
            // -----
            if(tolength == 0){
                Mtoracica = toracica / 2;
                $(".T_DM").val(Mtoracica.toFixed(2).replace('.',','));
            }else if(tolength == 1){
                Mtoracica = toracica / 1;
                $(".T_DM").val(Mtoracica.toFixed(2).replace('.',','));
            }
        });
        // -----
        var Msubescapular = 0;
        var subescapular = 0;
        var sublength = 0;
        $(".SD").each(function(){
            subescapular += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                sublength += $(this).length;
            }
            // -----
            if(sublength == 0){
                Msubescapular = subescapular / 2;
                $(".SDM").val(Msubescapular.toFixed(2).replace('.',','));
            }else if(sublength == 1){
                Msubescapular = subescapular / 1;
                $(".SDM").val(Msubescapular.toFixed(2).replace('.',','));
            }
        });
        // -----
        var MaxiliarM = 0;
        var axiliarM = 0;
        var axilengthM = 0;
        $(".AMD").each(function(){
            axiliarM += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                axilengthM += $(this).length;
            }
            // -----
            if(axilengthM == 0){
                MaxiliarM = axiliarM / 2;
                $(".AMDM").val(MaxiliarM.toFixed(2).replace('.',','));
            }else if(axilengthM == 1){
                MaxiliarM = axiliarM / 1;
                $(".AMDM").val(MaxiliarM.toFixed(2).replace('.',','));
            }
        });
        // ------
        var MsupraI = 0;
        var supraI = 0;
        var suplength = 0;
        $(".SID").each(function(){
            supraI += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                suplength += $(this).length;
            }
            // -----
            if(suplength == 0){
                MsupraI = supraI / 2;
                $(".SIDM").val(MsupraI.toFixed(2).replace('.',','));
            }else if(suplength == 1){
                MsupraI = supraI / 1;
                $(".SIDM").val(MsupraI.toFixed(2).replace('.',','));
            }
        });
        // ------
        var Mabdominal = 0;
        var abdominal = 0;
        var abdlength = 0;
        $(".AD").each(function(){
            abdominal += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                abdlength += $(this).length;
            }
            // -----
            if(abdlength == 0){
                Mabdominal = abdominal / 2;
                $(".ADM").val(Mabdominal.toFixed(2).replace('.',','));
            }else if(abdlength == 1){
                Mabdominal = abdominal / 1;
                $(".ADM").val(Mabdominal.toFixed(2).replace('.',','));
            }
        });
        // ------
        var Mcoxa = 0;
        var coxa = 0;
        var coxalength = 0;
        $(".CD").each(function(){
            coxa += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                coxalength += $(this).length;
            }
            // -----
            if(coxalength == 0){
                Mcoxa = coxa / 2;
                $(".CDM").val(Mcoxa.toFixed(2).replace('.',','));
            }else if(coxalength == 1){
                Mcoxa = coxa / 1;
                $(".CDM").val(Mcoxa.toFixed(2).replace('.',','));
            }
        });
        // ------
        var MpanturrilhaM = 0;
        var panturrilhaM = 0;
        var panlength = 0;
        $(".PMD").each(function(){
            panturrilhaM += parseFloat($(this).val().replace(',','.')) || 0;
            if($(this).val() == "" || $(this).val() == '0,0'){
                panlength += $(this).length;
            }
            // -----
            if(panlength == 0){
                MpanturrilhaM = panturrilhaM / 2;
                $(".PMDM").val(MpanturrilhaM.toFixed(2).replace('.',','));
            }else if(panlength == 1){
                MpanturrilhaM = panturrilhaM / 1;
                $(".PMDM").val(MpanturrilhaM.toFixed(2).replace('.',','));
            }
        });
    });
    // ---Data
    $(".data").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'ptBR'
    });
    // ------
    $('[data-mask]').inputmask()
    //Validando cpf
    var Vcpf = false;
    $(function(){
        // Aciona a validação a cada tecla pressionada
        var temporizador = false;
        $('.cpf').on("keyup blur", function(){
            var cpf = $(this);
            // Limpa o timeout antigo
            if ( temporizador ) {
                clearTimeout( temporizador );
            }
            // Cria um timeout novo de 500ms
            temporizador = setTimeout(function(){
                // O CPF
                var cpfV = cpf.val();
                // Valida
                var valida = valida_cpf_cnpj( cpfV );
                // Testa a validação
                if ( valida ) {
                    Vcpf = cpf.val();
                } else {
                    Vcpf = false;
                }
            }, 500);
        });
    });//fecha cpf
    $.validator.addMethod("cpfaluno", function(value, element){
        return value == Vcpf;
    });
    // ------
    $('#form_aluno').validate({
        rules: {
            cpfaluno: {
                required: false,
                cpfaluno: true
            },
            nomealuno: {
                required: true,
                minlength: 10
            },
            emailaluno: {
                email: true
            },
            datanascimento: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            cpfaluno: {
                cpfaluno: "CPF incorreto"
            },
            nomealuno: {
                required: "Preencha o campo Nome",
                minlength: "Digite o nome completo"
            },
            emailaluno: {
                email: "Email com formato inválido"
            },
            datanascimento: {
                required: "Digite sua data de nascimento"
            }
        }
    });
    // Validação contraditoria ----
    $("#protocolos .vazio").attr("required", true);
    $("#check-protocolo").on("click focus", function(){
        $("#alert-protocolo").empty();
        var isValid = true;

        // Buscamos todos os inputs com a classe "fonercedorVazio" para verificar se estãp vazios
        $("#protocolos .vazio").each(function(){
            var element = $(this);
            if(element.val() == ""){
                isValid = false;
            }
        });

        if($("#check-protocolo").prop("checked") || isValid == true){
            $("#alert-protocolo").empty();
            $("#protocolos .vazio").attr("required", true);
        }else{
            $("#protocolos .vazio").attr("required", false);

            $("#protocolos .vazio").parent().removeClass('has-error');

            $("#alert-protocolo").html(
                '<div class="alert alert-warning alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<h4><i class="icon fa fa-warning"></i> Cuidado!</h4>'+
                    'Cuidado! ao desmarcar a caixa você não precisará utilizar os <strong>Protocolos e Biometrias</strong> mas também não sera possivel determinar certos pontos de contas.'+
                '</div>'
            );
        }
    });
    // ---->
    $("#bioimpedancias .vazio").attr("required", true);
    $("#check-bioimpedancia").on("click focus", function(){
        $("#alert-bioimpedancia").empty();
        var isValid = true;

        // Buscamos todos os inputs com a classe "fonercedorVazio" para verificar se estãp vazios
        $("#bioimpedancias .vazio").each(function(){
            var element = $(this);
            if(element.val() == ""){
                isValid = false;
            }
        });

        if($("#check-bioimpedancia").prop("checked") || isValid == true){
            $("#alert-bioimpedancia").empty();
            $("#bioimpedancias .vazio").attr("required", true);
        }else{
            $("#bioimpedancias .vazio").attr("required", false);

            $("#bioimpedancias .vazio").parent().removeClass('has-error');
            $("#bioimpedancias .vazio").parent().parent().removeClass('has-error');

            $("#alert-bioimpedancia").html(
                '<div class="alert alert-warning alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<h4><i class="icon fa fa-warning"></i> Cuidado!</h4>'+
                    'Cuidado! ao desmarcar a caixa você não precisará utilizar a <strong>Bioimpedância</strong> mas também não sera possivel determinar certos pontos de contas.'+
                '</div>'
            );
        }
    });
    // Multiplicação do peso com a porcentagem da massa ossea
    $("#peso, #massaossea_p").on("keyup blur", function(){
        var peso = $("#peso").val().replace(",",".");
        var massaossea_p = $("#massaossea_p").val().replace(",",".");

        var result = (massaossea_p * peso) / 100;

        if(result != 0.0){
            $(".massaossea_kg").val(result.toFixed(2).replace(".",","));
        }
    });
    // Validaçãos da nova ficha
    $('#form_ficha').validate({
        rules: {
            dataficha: {
                required: true
            },
            altura: {
                required: true
            },
            peso: {
                required: true
            },
            sexo: {
                required: true
            },
            pescoco: {
                required: true
            },
            deltoides: {
                required: true
            },
            torax: {
                required: true
            },
            abdomeC: {
                required: true
            },
            abdomeM: {
                required: true
            },
            quadril: {
                required: true
            },
            bracoCD: {
                required: true
            },
            bracoCE: {
                required: true
            },
            bracoRD: {
                required: true
            },
            bracoRE: {
                required: true
            },
            antebracoD: {
                required: true
            },
            antebracoE: {
                required: true
            },
            coxaPD: {
                required: true
            },
            coxaPE: {
                required: true
            },
            coxaMD: {
                required: true
            },
            coxaME: {
                required: true
            },
            panturrilhaD: {
                required: true
            },
            panturrilhaE: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
            $(".saveficha").prop("disabled", false);
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(".saveficha").prop("disabled", false);
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            dataficha: {
                required: "Campo data Precisa ser preenchido"
            },
            altura: {
                required: "Campo altura precisa ser preenchido"
            },
            peso: {
                required: "Campo peso precisa ser preenchido"
            },
            sexo: {
                required: "Campo sexo precisa ser preenchido"
            },
            pescoco: {
                required: "Campo pescoço precisa ser preenchido"
            },
            deltoides: {
                required: "Campo deltoides precisa ser preenchido"
            },
            torax: {
                required: "Campo torax precisa ser preenchido"
            },
            abdomeC: {
                required: "Campo abdome C precisa ser preenchido"
            },
            abdomeM: {
                required: "Campo abdome M precisa ser preenchido"
            },
            quadril: {
                required: "Campo quadril precisa ser preenchido"
            },
            bracoCD: {
                required: "Campo Braço Contraído precisa ser preenchido"
            },
            bracoCE: {
                required: "Campo Braço Contraído precisa ser preenchido"
            },
            bracoRD: {
                required: "Campo Baço Relaxado precisa ser preenchido"
            },
            bracoRE: {
                required: "Campo Baço Relaxado precisa ser preenchido"
            },
            antebracoD: {
                required: "Campo Antebraço precisa ser preenchido"
            },
            antebracoE: {
                required: "Campo Antebraço precisa ser preenchido"
            },
            coxaPD: {
                required: "Campo Coxa Proximal precisa ser preenchido"
            },
            coxaPE: {
                required: "Campo Coxa Proximal precisa ser preenchido"
            },
            coxaMD: {
                required: "Campo Coxa Media precisa ser preenchido"
            },
            coxaME: {
                required: "Campo Coxa Media precisa ser preenchido"
            },
            panturrilhaD: {
                required: "Campo Panturrilha precisa ser preenchido"
            },
            panturrilhaE: {
                required: "Campo Panturrilha precisa ser preenchido"
            },
            protocoloDC: {
                required: "Campo Protocolo Dobras Cutâneas precisa ser preenchido"
            },
            bicipitalD1: {
                required: "Campo Bicipital Direito 1 precisa ser preenchido"
            },
            bicipitalEU: {
                required: "Campo Bicipital Esquerda Unica precisa ser preenchido"
            },
            tricipitalD1: {
                required: "Campo Tricipital Direito 1 precisa ser preenchido"
            },
            tricipitalEU: {
                required: "Campo Tricipital Esquerda Unica precisa ser preenchido"
            },
            toracicaD1: {
                required: "Campo Toracica Direito 1 precisa ser preenchido"
            },
            toracicaEU: {
                required: "Campo Toracica Esquerda Unica precisa ser preenchido"
            },
            subescapularD1: {
                required: "Campo Subescapular Direito 1 precisa ser preenchido"
            },
            subescapularEU: {
                required: "Campo Subescapular Esquerda Unica precisa ser preenchido"
            },
            axiliarmediaD1: {
                required: "Campo Axiliar Média Direito 1 precisa ser preenchido"
            },
            axiliarmediaEU: {
                required: "Campo Axiliar Média Esquerda Unica precisa ser preenchido"
            },
            suprailiacaD1: {
                required: "Campo Supra Ilíaca Direito 1 precisa ser preenchido"
            },
            suprailiacaEU: {
                required: "Campo Supra Ilíaca Esquerda Unica precisa ser preenchido"
            },
            abdominalD1: {
                required: "Campo Abdominal Direito 1 precisa ser preenchido"
            },
            abdominalEU: {
                required: "Campo Abdominal Esquerda Unica precisa ser preenchido"
            },
            coxaD1: {
                required: "Campo Coxa Direito 1 precisa ser preenchido"
            },
            coxaEU: {
                required: "Campo Coxa Esquerda Unica precisa ser preenchido"
            },
            panturrilhamedialD1: {
                required: "Campo Panturrilha Medial Direito 1 precisa ser preenchido"
            },
            panturrilhamedialEU: {
                required: "Campo Panturrilha Medial Esquerda Unica precisa ser preenchido"
            },
            abdomen: {
                required: "Campo Abdomen precisa ser preenchido, caso não queira preencher, desmarque a caixa"
            },
            flexao: {
                required: "Campo Flexao precisa ser preenchido, caso não queira preencher, desmarque a caixa"
            },
            gorduracorporal: {
                required: "Campo Gordura Corporal precisa ser preenchido"
            },
            massamuscular: {
                required: "Campo Massa Muscular precisa ser preenchido"
            },
            agua: {
                required: "Campo Água precisa ser preenchido"
            },
            proteina: {
                required: "Campo Proteina precisa ser preenchido"
            },
            gorduravisceral: {
                required: "Campo Gordura Visceral precisa ser preenchido"
            },
            massaossea: {
                required: "Campo Massa Óssea precisa ser preenchido"
            },
            idadecorporal: {
                required: "Campo Idade Corporal Precisa ser preenchido"
            },
            taxametabolismo: {
                required: "Campo Taxa de Metaboslimo precisa ser preenchido"
            }
        }
    });
    // Botão save
    $(".saveficha").click(function(){
        $(this).prop("disabled", true);
        // Validação contraditoria
        if($("[name=abdomencheck]").prop("checked")){
            $("[name=abdomen]").attr("required", true);
        }else{
            $("[name=abdomen]").attr("required", false);

            $("[name=abdomen]").parent().parent().removeClass('has-error');
        }
        // ----
        if($("[name=flexaocheck]").prop("checked")){
            $("[name=flexao]").attr("required", true);
        }else{
            $("[name=flexao]").attr("required", false);

            $("[name=flexao]").parent().parent().removeClass('has-error');
        }
    });
});

