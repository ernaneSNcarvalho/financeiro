
function ValidarCamposCategoria() {

    if ($("#nome").val().trim() == '') {
        alert('Preencher o campo NOME');
        return false;
    }
}

function ValidarCamposEmpresa() {
    
    if($("#empresa").val().trim() == '' || $("#telefone").val().trim() == '' || $("#endereco").val().trim() == '')
    {
        alert("Preencher todos os campos");
        return false;
    }
}

function ValidarCamposConta(){

    if($("#banco").val().trim() == ''){
        alert("Preencher campo BANCO");
        return false;
    }else if($("#agencia").val().trim() == ''){
        alert("Preencher campo AGENCIA");
        return false;
    }else if($("#conta").val().trim() == ''){
        alert("Preencher campo CONTA");
        return false;
    }else if($("#saldo").val().trim() == ''){
        alert("Preencher campo SALDO");
        return false;
    }
}

function ValidarCamposMovimento(){

    if($("#tipo").val().trim() == '' || 
    $("#data").val().trim() == '' ||
    $("#valor").val().trim() == '' ||
    $("#emp").val().trim() == '' ||
    $("#cat").val().trim() == '' ||
    $("#cont").val().trim() == '')
    {
        alert("Preencher todos os campos");
        return false;
    }
}

function ValidarCamposMeusDados(){
    if($("#nome").val().trim()== ''){
        alert("Preencher o campo NOME");
        return false;
    }else if($("#email").val().trim()== ''){
        alert("Preencher o campo e-mail");
        return false;
    }
}

function ValidarCamposUsuario(){
    if($("#nome").val().trim() == ''){
        alert("Preencher o campo NOME");
        return false;

    }else if($("#email").val().trim() == ''){
        alert("Preencher o campo E-mail");
        return false;

    }else if($("#senha").val().trim() == '' && $("#senha2").val().trim() == ''){
        alert("Preencher o campo Senha");
        return false;

    }else if(string.length($("#senha").val()) != 6 && string.length($("#senha2").val()) != 6){
        alert("Senha deve conter 6 caracteres");
        return false;
    
    }else if($("#senha").val() !== $("#senha2")){
        alert("As senhas não estão iguais, favor tentar novamente!");
        return false;
    }
}