//Executar Mascaras
//Define o objeto e chama função
function mascara(o,f) {
    objeto=o
    funcao=f
    setTimeout ("executaMascara()",1)
}

function executaMascara(){
    objeto.value=funcao (objeto.value)
}

function telefone(variavel){
    variavel=variavel.replace (/\D/g,"") //Remove tudo que não é digito
    //A linha abaixo é responsavel de adicionar parenteses em volta dos dois primeiros digitos
    variavel=variavel.replace (/^(\d\d)(\d)g,"($1) $2")
    //A linha abaixo é responsavel de adicionar o hifen entre o quarto e quinto digito
    variavel=variavel.replace (/(\d{4})(\d)/,"$1-$2")
    return variavel
}

function RGeCPF(variavel){
    variavel=variavel.replace /\D/g,"" //remove tudo que não é numero
    //coloca um ponto após o terceiro e quarto digito
    variavel=variavel.replace /(\d{3})(\d)/,"$1.$2"
    //coloca um ponto apos o sexto e o setimo digito
    variavel=variavel.replace /(\d{3})(\d)/,"$1.$2"
    //COLOCA HIFEM APOS O SETIMO DIGITO E PERMITE APENAS 2 DIGITOS APOS P HIFEN
    variavel=variavel.replace /(\d{3})(\d{1,2})$/,"$1-$2"
}

function cep(variavel){
    variavel=variavel.replace /\D/g, ""
    variavel=variavel.replace /(\d{2})(\d)/,"$1.$2"
    variavel=variavel.replace /(\d{3})(\d{1,2})$/,"$1-$2"
    return variavel
}

function data(variavel){
    variavel=variavel.replace /\D/g, ""
    variavel=variavel.replace /(\d{2})(\d)/,"$1/$2"
    variavel=variavel.replace /(\d{2})(\d)/,"$1/$2"
    return variavel
}

