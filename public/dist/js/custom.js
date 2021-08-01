$(document).ready(function(){
    // Bar charts Composição Corporal
    $(function () {
        /*
        * BAR CHART
        * ---------
        */

        var pesoa = $("#pesochartcca").text();
        var pesomx = $("#pesochartccmx").val();
        var pesomn = $("#pesochartccmn").val();

        var bar_datacc_minimo = {
            data : [['Ideal Minimo - '+pesomn, pesomn]],
            color: 'blue'
        }
        var bar_datacc_maximo = {
            data : [['Ideal Maximo - '+pesomx, pesomx]],
            color: 'green'
        }
        var bar_datacc_atual = {
            data : [['Atual - '+pesoa, pesoa.replace(',','.')]],
            color: 'red'
        }
        $.plot('#bar-chartCC', [bar_datacc_minimo, bar_datacc_maximo, bar_datacc_atual], {
        grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
        },
        series: {
            bars: {
            show    : true,
            barWidth: 0.5,
            align   : 'center'
            }
        },
        xaxis : {
            mode      : 'categories',
            tickLength: 0
        }
        })
        /* END BAR CHART */
    });
    // Bar charts % Gordura Corporal Dobras Cutâneas
    $(function () {
        /*
        * BAR CHART
        * ---------
        */

        var pgcdca = $("#chartgcdca").text();
        var pgcdcideal = $("#chartgcdcideal").val();
        var pgcdcaceitavel = $("#chartgcdcaceitavel").val();

        var bar_datagcdc_ideal = {
            data : [['%G Ideal - '+pgcdcideal.replace('.',','), pgcdcideal]],
            color: 'green'
        }
        var bar_datagcdc_aceitavel = {
            data : [['%G Aceitavel - '+pgcdcaceitavel.replace('.',','), pgcdcaceitavel]],
            color: 'blue'
        }
        var bar_datagcdc_atual = {
            data : [['%G Atual - '+pgcdca, pgcdca.replace(',','.')]],
            color: 'red'
        }
        $.plot('#bar-chartGCDC', [bar_datagcdc_ideal, bar_datagcdc_aceitavel, bar_datagcdc_atual], {
            grid  : {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor  : '#f3f3f3'
            },
            series: {
                bars: {
                show    : true,
                barWidth: 0.5,
                align   : 'center'
                }
            },
            xaxis : {
                mode      : 'categories',
                tickLength: 0
            }
        })
        /* END BAR CHART */
    });
    // Bar charts % Gordura Corporal Bioimpedancia
    $(function () {
        /*
        * BAR CHART
        * ---------
        */

        var pgcba = "";
        if($("#chartgcba").text() == ""){
            pgcba = "";
        }else{
            pgcba = parseFloat($("#chartgcba").text().replace(',','.')).toFixed(2);
        }

        var pgcbideal = $("#chartgcbideal").val();
        var pgcbaceitavel = $("#chartgcbaceitavel").val();

        var bar_datagcb_ideal = {
            data : [['%G Ideal - '+pgcbideal.replace('.',','), pgcbideal]],
            color: 'green'
        }
        var bar_datagcb_aceitavel = {
            data : [['%G Aceitavel - '+pgcbaceitavel.replace('.',','), pgcbaceitavel]],
            color: 'blue'
        }
        var bar_datagcb_atual = {
            data : [['%G Atual - '+pgcba.replace('.',','), pgcba]],
            color: 'red'
        }
        $.plot('#bar-chartGCB', [bar_datagcb_ideal, bar_datagcb_aceitavel, bar_datagcb_atual], {
            grid  : {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor  : '#f3f3f3'
            },
            series: {
                bars: {
                show    : true,
                barWidth: 0.5,
                align   : 'center'
                }
            },
            xaxis : {
                mode      : 'categories',
                tickLength: 0
            }
        })
        /* END BAR CHART */
    });
});