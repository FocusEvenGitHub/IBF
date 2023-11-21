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
                    $.notify("Usuário ou senha incorretos!", "error");
                    // console.log('Usuário ou senha incorretos!');
                } else {
                    console.log('Usuário Válido!');
                    $.ajax({ //Ajax de redirecionamento
                        url: 'ajax_redirect',
                        type: 'POST',
                        async: true,
                        data: { location: 'home_user' }
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
        });
