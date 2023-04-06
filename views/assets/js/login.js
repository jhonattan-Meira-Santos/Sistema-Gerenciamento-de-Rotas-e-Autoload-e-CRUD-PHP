    
/* Ação de Click do Formulario - Necessário Fazer Verificações (Jhonattan 11-03-23) */
function verificarLogin(){
    /* Declaração de Váriaveis */
    const email = $("#email").val();
    const senha = $("#senha").val();

    /* Esconde alertas caso esteja ativo */
    $("#alert-email").addClass("hidden");
    $("#alert-senha").addClass("hidden");


    if (email && senha) {
        $.ajax
        ({
            type: 'POST', //Método => POST | GET
            dataType: 'html', //Tipo de retorno da página
            url: '../ajax/ajaxLogar.php', 
            data: { 
                "email": email, 
                "senha": senha
            },
            success: function(data){
                
            },
            error: function(){
                alert("Ocorreu um erro, tente novamente mais tarde. =)");
            },
        })
    } else {
        faltandoCampo(email ? "senha" : "email");
    }
};

/* Ação de alertar ao usuário quais campos estão faltando */
function faltandoCampo(campo){
    let elemento = $("#alert-" + campo);
    $(elemento).toggleClass("hidden");
}