function mascara(o, f) {
    objeto = o;
    funcao = f;
    setTimeout("executaMascara()", 1);
}

function executaMascara() {
    objeto.value = funcao(objeto.value);
}

function rg(variavel) {
    variavel = variavel.replace(/\D/g, ""); 

    variavel = variavel.replace(/(\d{2})(\d)/, "$1.$2");

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");

    variavel = variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return variavel;
}

function cep(variavel) {
    variavel = variavel.replace(/\D/g, "")

    variavel = variavel.replace(/(\d{5})(\d{1,3})$/, "$1-$2");

    return variavel;
}

function cpf(variavel) {
    variavel = variavel.replace(/\D/g, ""); 

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");

    variavel = variavel.replace(/(\d{3})(\d)/, "$1.$2");

    variavel = variavel.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return variavel;
}

function nome(variavel) {
    variavel = variavel.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
    return variavel;
}

function numero(variavel){
    variavel = variavel.replace(/\D/g, "");
    return variavel;
}

function rua(variavel){
    variavel = variavel.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
    return variavel;
}

function bairro(variavel){
    variavel = variavel.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
    return variavel;

}

function cidade(variavel){
    variavel = variavel.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
    return variavel;

}

