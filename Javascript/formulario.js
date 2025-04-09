//EXECUTAR MASCARAS
//DEFINE O OBJETO E CHAMA FUNÇÃO
function mascara(o, f) {
    objeto = o;
    funcao = f;
    setTimeout("executaMascara()", 1);
}

function executaMascara() {
    objeto.value = funcao(objeto.value);
}

//MASCARAS

//MASCARA DO TELEFONE
function telefone(variavel) {
    variavel = variavel.replace(/\D/g, ""); // REMOVE TUDO QUE NÃO É DIGITO

    // ADICIONA PARENTESES EM VOLTA DOS DOIS PRIMEIROS DIGITOS
    variavel = variavel.replace(/^(\d{2})(\d)/, "($1)$2");

    // ADICIONA HIFEM ENTRE O QUARTO E QUINTO NUMERO
    variavel = variavel.replace(/(\d{5})(\d)/, "$1-$2");

    return variavel;
}

//MASCARA DO RG E CPF
function RGeCPF(variavel) {
    variavel = variavel.replace(/\D/g, ""); // REMOVE TUDO QUE NAO É NUMERO

    // COLOCA UM PONTO APOS O TERCEIRO DIGITO
    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");

    // COLOCA UM PONTO APOS O SEXTO DIGITO
    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");

    // COLOCA HIFEN APÓS O SEXTO DIGITO OU SETIMO DIGITO
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return variavel;
}

//MASCARA DO CEP
function cep(variavel) {
    variavel = variavel.replace(/\D/g, ""); // REMOVE TUDO QUE NAO É NUMERO

    // ADICIONA O HÍFEN NA MÁSCARA DE CEP
    variavel = variavel.replace(/(\d{5})(\d{1,3})$/, "$1-$2");

    return variavel;
}

//MASCARA DATA
function data(variavel) {
    variavel = variavel.replace(/\D/g, ""); // REMOVE TUDO QUE NAO É NUMERO
    variavel = variavel.replace(/(\d{2})(\d)/, "$1/$2"); // COLOCA A PRIMEIRA BARRA
    variavel = variavel.replace(/(\d{2})(\d)/, "$1/$2"); // COLOCA A SEGUNDA BARRA

    return variavel;
}