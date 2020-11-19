 function callbackLogar(googleUser) {
 	var profile = googleUser.getBasicProfile();

 	$.ajax({
 		url: "/logarFacebook?id="+profile.getId()+'&&name='+profile.getName()+'&&foto='+profile.getImageUrl()+'&&email='+profile.getEmail(),
 		dataType: 'json',
 		success: function(dados) {
 			if (dados.resultado) {
 				window.location = '/home';
 			}else{
 				alert("Erro ao logar no sistema");
 			}
 		}
 	});


 }
 function callbackLogarPI(googleUser) {
 	var profile = googleUser.getBasicProfile();
 }
 function deslogargoogle() {
 	var auth2 = gapi.auth2.getAuthInstance();
 	auth2.signOut().then(function () {
 		console.log('Usuario deslogado');
 	});
 }
 function deslogar(event) {
 	event.preventDefault();
 	deslogargoogle();

 	document.getElementById('logout-form').submit();
 }

 function pesquisacep(campoCEP,idRua,idBairro,idCidade,idUf) {

   //Nova variável "cep" somente com dígitos.
   var cep = $(campoCEP).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#"+idRua).val("...");
                        $("#"+idBairro).val("...");
                        $("#"+idCidade).val("...");
                        $("#"+idUf).val("...");
                      //  $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.ajax({
                        	url: "https://viacep.com.br/ws/"+ cep +"/json/?callback=?",
                        	dataType: 'json',
                        	success: function(dados) {

                        		if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#"+idRua).val(dados.logradouro);
                                $("#"+idBairro).val(dados.bairro);
                                $("#"+idCidade).val(dados.localidade);
                                $("#"+idUf).val(dados.uf);
                               // $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                $("#"+idRua).val("");
                                $("#"+idBairro).val("");
                                $("#"+idCidade).val("");
                                $("#"+idUf).val("");
                                alert("CEP não encontrado.");
                            }

                        }
                    });
                        /*
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        	
                        });
                        */

                    } //end if.
                    else {
                        //cep é inválido.
                        $("#"+idRua).val("");
                        $("#"+idBairro).val("");
                        $("#"+idCidade).val("");
                        $("#"+idUf).val("");
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    $("#"+idRua).val("");
                    $("#"+idBairro).val("");
                    $("#"+idCidade).val("");
                    $("#"+idUf).val("");
                }

            }