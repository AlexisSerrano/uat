$(document).ready(function(){
    if($("#tipoActa").val() == 'OTROS DOCUMENTOS'){
        $(".otros").show();
    }
    else{
        $(".otros").hide();
    }

    $("#tipoActa").change(function(){
        valor = $(this).val();
        if(valor == 'OTROS DOCUMENTOS'){
            $(".otros").show();
        }
        else{
            $("#otro").val('');
            $(".otros").hide();
        }
    });
});