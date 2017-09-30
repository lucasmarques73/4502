$(document).ready(function () {
	if($(".submenu").length){
		$("#menu > ul > li").hover(function(){
			$(this).find(".submenu").stop(true).slideDown();
		},function(){
			$(this).find(".submenu").stop(true).slideUp();
		});
	}

	$('input, textarea').placeholder();
});

function validaContato(){
	var nome = $("#nome");
	var email = $("#email");
	var assunto = $("#assunto");
	var mensagem = $("#mensagem");
	var mensagem_submit = $("#mensagem_submit");
	var erro = 0;

	if(nome.val() == ""){
		nome.addClass("campo_erro");
		erro = 1;
	} else{
		nome.removeClass("campo_erro");
	}

	if(email.val() == "" || !validaEmail(email.val())){
		email.addClass("campo_erro");
		erro = 1;
	} else{
		email.removeClass("campo_erro");
	}

	if(assunto.val() == ""){
		assunto.addClass("campo_erro");
		erro = 1;
	} else{
		assunto.removeClass("campo_erro");
	}

	if(mensagem.val() == ""){
		mensagem.addClass("campo_erro");
		erro = 1;
	} else{
		mensagem.removeClass("campo_erro");
	}

	if(erro == 1){
		mensagem_submit.addClass("campo_erro");
		mensagem_submit.html("Preencha corretamente os campos em vermelho.");
        return false;
    }
    return true;
}

function validaCadastro(){
	var nome = $("#nome");
	var cpf_cnpj = $("#cpf_cnpj");
	var celular = $("#celular");
	var email = $("#email");
	var cep = $("#cep");
	var estado = $("#estado");
	var bairro = $("#bairro");
	var endereco = $("#endereco");
	var cidade = $("#cidade");
	var mensagem_submit = $("#mensagem_submit");
	var erro = 0;

	if(nome.val() == ""){
		nome.addClass("campo_erro");
		erro = 1;
	} else{
		nome.removeClass("campo_erro");
	}

	if(cpf_cnpj.val() == ""){
		cpf_cnpj.addClass("campo_erro");
		erro = 1;
	} else{
		cpf_cnpj.removeClass("campo_erro");
	}

	if(celular.val() == ""){
		celular.addClass("campo_erro");
		erro = 1;
	} else{
		celular.removeClass("campo_erro");
	}

	if(email.val() == "" || !validaEmail(email.val())){
		email.addClass("campo_erro");
		erro = 1;
	} else{
		email.removeClass("campo_erro");
	}

	if(cep.val() == ""){
		cep.addClass("campo_erro");
		erro = 1;
	} else{
		cep.removeClass("campo_erro");
	}

	if(estado.val() == ""){
		estado.addClass("campo_erro");
		erro = 1;
	} else{
		estado.removeClass("campo_erro");
	}

	if(bairro.val() == ""){
		bairro.addClass("campo_erro");
		erro = 1;
	} else{
		bairro.removeClass("campo_erro");
	}

	if(endereco.val() == ""){
		endereco.addClass("campo_erro");
		erro = 1;
	} else{
		endereco.removeClass("campo_erro");
	}

	if(cidade.val() == ""){
		cidade.addClass("campo_erro");
		erro = 1;
	} else{
		cidade.removeClass("campo_erro");
	}

	if(erro == 1){
		mensagem_submit.addClass("campo_erro");
		mensagem_submit.html("Preencha corretamente os campos em vermelho.");
        return false;
	}
    return true;
}

function validaEmail(email){
	var str = email;
	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(filtro.test(str)) {
		return true;
	} else {
		return false;
	}
}
