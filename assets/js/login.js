$(document).keypress(function (e) {
    if (e.which == 13) {
        $("#btn-logar").click();
    }
});

$(document).ready(function () {
    $("#btn-logar").click(function(){
        // Get the values of the email and senha inputs
        var email = document.getElementById('email').value;
        var senha = document.getElementById('senha').value;

        // Create an array and add the values to it
        // var jsonData = [email, senha];
        var jsonData = JSON.stringify({ email: email, senha: senha });
        console.log(jsonData);
        
        // var notify = true;
        $.ajax({
            url: 'valida_login', 
            type: 'POST',
            data: jsonData,
            contentType: 'application/json',
            success: function (retorno) {
                console.log("Sucesso: " + retorno);
                if (retorno == 3218181) {
                    // $.notify('Usuário ou senha incorretos!', "warning");
                    console.log('Usuário ou senha incorretos!');
                } else {
                    console.log('Usuário Válido!');
                    $.ajax({ //Ajax de redirecionamento
                        url: 'ajax_redirect',
                        type: 'POST',
                        async: true,
                        data: { location: 'usuario' }
                    });
                }
            },  
            error: function(){
                console.log('login.js2');
            }
        });
    });

    $('btn-visita').click(function(){
        $.ajax({
            url: 'home_convidado', 
            success: function (retorno) {
                console.log("Sucesso!");
            },  
            error: function(){
                console.log('Error!');
            }
        });
    });

    // $("#btn-verificar-entrar").click(function () { // Botão da modal
    //     var notify = true;
    //     $.ajax({
    //         url: 'index.php/Login/code_verification', // Verifica se o codigo inserido esta correto
    //         type: 'POST',
    //         data: { codigo: $('#codigo').val() }, // Obtém o código digitado pelo usuário
    //         dataType: 'json',
    //         success: function (resposta) {
    //             if (resposta.valido) {
    //                 $.notify('Código válido!', "success");  // Exibe a mensagem de código válido    
    //                 var serializedData = $("#form_login").serialize();
    //                 $.ajax({
    //                     url: 'index.php/Login/validar_login', // Valida e loga no SUPRA
    //                     type: 'POST',
    //                     data: serializedData,
    //                     success: function (retorno) {
    //                         if (retorno == 3218181) {
    //                             $.notify('Usuário ou senha incorretos!', "warning");
    //                         } else {
    //                             spinnerLoadingStill = true;
    //                             $.ajax({ //Ajax de redirecionamento
    //                                 url: 'index.php/Login/ajax_redirect',
    //                                 type: 'POST',
    //                                 async: true,
    //                                 data: { location: 'index.php/Home' }
    //                             });
    //                         }
    //                     }
    //                 });
    //             } else {
    //                 $.notify('Código inválido!', "warning"); // Exibe a mensagem de código inválido 
    //             }
    //         },
    //         error: function () {
    //             console.log("Erro ao verificar o código."); // Exibe a mensagem de erro no console
    //         }
    //     });
    // })
    // $("#btn-entrar").click(function () {
    //     //alert('oi===='+serializedData);
    //     if ($("#nume_matricula").val() == "") {
    //         $.notify("Por favor, informe o seu \"Email\".", 'info');
    //         $("#nume_matricula").focus();
    //         return false;
    //     }
    //     if ($("#codi_senha").val() == "") {
    //         $.notify("Por favor, informe a sua \"Senha\".", 'info');
    //         $("#codi_senha").focus();
    //         return false;
    //     }
    //     var BASE_URL = '<?php echo base_url(); ?>';
    //     var serializedData = $("#form_login").serialize();
    //     var notify = true;
    //     $.ajax({ // Apenas valida se a conta esta correta, sem logar
    //         url: 'index.php/Login/validar_conta',
    //         type: 'POST',
    //         data: serializedData,
    //         success: function (FLAG_VERIFICA_ACESSO, retorno) {
    //             if (retorno == 3218181) {
    //                 $.notify('Usuário ou senha incorretos!', "warning");
    //             } else {
    //                 if (FLAG_VERIFICA_ACESSO == 1){ //logar sem precisar do codigo se flag for 1
    //                     $.ajax({
    //                         url: 'index.php/Login/validar_login',
    //                         type: 'POST',
    //                         data: serializedData,
    //                         success: function (retorno) {
    //                             if (retorno == 3218181) {
    //                                 $.notify('Usuário ou senha incorretos!', "warning");
    //                             } else {
    //                                 spinnerLoadingStill = true;
    //                                 $.ajax({ //Ajax de redirecionamento
    //                                     url: 'index.php/Login/ajax_redirect',
    //                                     type: 'POST',
    //                                     async: true,
    //                                     data: { location: 'index.php/Home' }
    //                                 });
    //                             }
    //                         }
    //                     });
    //                 }else{ //modal do codigo se flag for 0 ou diferente
    //                     var modal = document.getElementById("CodeModal");
    //                     modal.style.display = "block";
    //                 }
    //             }

    //         }, error: function (jqXHR, textStatus, errorMessage) {
    //             if (notify) {
    //                 //$.notify('Ocorreu um erro: ' + errorMessage, "warning");
    //                 $.notify('Ocorreu um erro ao consultar o banco de dados. \r\nTente novamente mais tarde. ', "warning");
    //             }
    //         }
    //     });
    // });
    //--------------------------------------------------------------------------
//     $("#acesso-coordenacao").change(function () {
//         if (this.value == "CGCONT") {
//             $("#emailSolicitacao").text("supra.construcao@dnit.gov.br");
//             $("#emailSolicitacao").attr("href", "mailto:supra.construcao@dnit.gov.br")
//         } else if (this.value == "CGMRR") {
//             $("#emailSolicitacao").text("supra.manutencao@dnit.gov.br");
//             $("#emailSolicitacao").attr("href", "mailto:supra.manutencao@dnit.gov.br")
//         } else if (this.value == "CGPERT") {
//             $("#emailSolicitacao").text("supra.operacoes@dnit.gov.br");
//             $("#emailSolicitacao").attr("href", "mailto:supra.operacoes@dnit.gov.br")
//         }
//     });
// });
// //------------------------------------------------------------------------------
// $(document).keypress(function (e) {
//     // Verificar se a modal está com display: none
//     var codeModal = document.getElementById("CodeModal");
//     if (getComputedStyle(codeModal).display === "none") {
// // Verificar se a tecla pressionada é o Enter (código 13)
//         if (e.which === 13) {
//             $("#btn-entrar").click();
//         }
//     }
//     // Verificar se a modal está com display: block
//     if (getComputedStyle(codeModal).display === "block") {        
//         // Verificar se a tecla pressionada é o Enter (código 13)
//         if (e.which === 13) {
//             $("#btn-verificar-entrar").click();
//         }
//     }
// });
// function mensagemEnap() {
//     $('#modalEnap').removeClass('hide').modal('show');
// }
// function generate_codeJS() {
//     var codeModal = document.getElementById("CodeModal");
//     if (getComputedStyle(codeModal).display === "block") {
//         var notify = true;
//         var serializedData = $("#form_login").serialize();
//         $.ajax({ // Gera o código e manda por e-mail do usuário
//             url: 'index.php/Login/generate_code',
//             type: 'POST',
//             data: serializedData,
//             dataType: 'json',
//             success: function (data) {
//                 if (data.valido) {
//                     $.notify('Código Enviado com sucesso!', "info");
//                 } else {
//                     $.notify(data.mensagem, "error");
//                 }
//             },
//             error: function () {
//                 console.log("Erro na chamada AJAX");
//                 $.notify('Não foi possível enviar o código!', "error");
//             }
        });
//     }
// }
