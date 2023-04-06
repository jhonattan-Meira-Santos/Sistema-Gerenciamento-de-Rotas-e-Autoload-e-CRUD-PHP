/* Ação de Click do Formulario - Necessário Fazer Verificações (Jhonattan 10-03-23) */
function verificarCadastro(){

    /* Esconde alertas caso esteja ativo */
    $("#alert-nome").addClass("hidden");
    $("#alert-email").addClass("hidden");
    $("#alert-senha").addClass("hidden");
    $("#alert-telefone").addClass("hidden");
    $("#alert-confirm-senha").addClass("hidden").text("Insira sua senha novamente.");

/* Declaração de Váriaveis E verificação de váriaveis vazias */
    const nome           = $("#nome").val() == "" ? faltandoCampo("nome") : $("#nome").val();
    const email          = $("#email").val() == "" ? faltandoCampo("email") : $("#email").val();
    const senha          = $("#senha").val() == "" ? faltandoCampo("senha") : $("#senha").val();
    const telefone       = $("#telefone").val() == "" ? faltandoCampo("telefone") : $("#telefone").val();
    const nascimentoDia  = $("#nascimento-dia").val() == "" ? faltandoCampo("data-dia") : $("#nascimento-dia").val();
    const nascimentoMes  = $("#nascimento-mes").val() == "" ? faltandoCampo("data-mes") : $("#nascimento-mes").val();
    const nascimentoAno  = $("#nascimento-ano").val() == "" ? faltandoCampo("data-ano") : $("#nascimento-ano").val();
    const confirmarSenha = $("#confirmar-senha").val() == "" ? faltandoCampo("confirm-senha") : $("#confirmar-senha").val();
    
    if (email && senha && nome && telefone && confirmarSenha && nascimentoDia && nascimentoMes && nascimentoAno) {
        if(senha == confirmarSenha) {
            $.ajax
            ({
                type: 'POST', //Método => POST | GET
                dataType: 'html', //Tipo de retorno da página
                url: '../ajax/ajaxRegistrarAdministrador.php', 
                data: { 
                    "nome": nome,
                    "email": email, 
                    "senha": senha,
                    "telefone": telefone,
                    "nascimentoDia": nascimentoDia,
                    "nascimentoMes": nascimentoMes,
                    "nascimentoAno": nascimentoAno
                },
                success: function(data){
                    
                },
                error: function(){
                    alert("Ocorreu um erro, tente novamente mais tarde. =)");
                },
            })
        } else {
            confirmacaoSenhaInvalida();
        }
    }
};

/* Ação de alertar ao usuário quais campos estão faltando */
function faltandoCampo(campo){
    let elemento = $("#alert-" + campo);
    $(elemento).removeClass("hidden");
    $(elemento).removeClass("d--none");
}

/* Ação de alertar ao usuário quais campos estão faltando */
function confirmacaoSenhaInvalida(){
    let elemento = $("#alert-confirm-senha");
    elemento.text("As senhas não são idênticas.");
    $(elemento).removeClass("hidden");
}

//Função que verifica o campo de telefone, Retirando caracteres errados
function verificaTelefone(event) {
    let input = event.target
    input.value = mascaraTelefone(input.value)
}

const mascaraTelefone = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }

// Função que verifica se o dia é válido
function verificarDia(valor) {
    return valor.length <= 2 && valor <= 31 && valor !== '';
}

// Função que verifica se o mês é válido
function verificarMes(valor) {
    return valor.length <= 2 && valor <= 12 && valor !== '';
}

// Função que verifica se o ano é válido e a idade é maior que 18 anos
function verificarAno(valor, anoAtual, idadeMaxima) {
    const idadeMinima = anoAtual - valor >= 18;

    return (
        valor.length <= 4 && 
        valor <= anoAtual && 
        valor !== '' && 
        valor >= idadeMaxima && 
        idadeMinima
    );
}
  
// Função que exibe o alerta de erro
function exibirAlerta(campo, mensagem) {
    $(campo).removeClass('d--none').text(mensagem);
}

// Verifica qual é o campo de data e executa as validações necessárias
function verificaData(campo, valor) {
    if (campo === 'dia') {
        const diaValido = verificarDia(valor);
        if (diaValido) {
            $('#alert-data-dia').addClass('d--none');
        } else {
            exibirAlerta('#alert-data-dia', 'Insira um dia válido.');
        }
    } else if (campo === 'mes') {
        const mesValido = verificarMes(valor);
        if (mesValido) {
            $('#alert-data-mes').addClass('d--none');
        } else {
            exibirAlerta('#alert-data-mes', 'Insira um mês válido.');
        }
    } else if (campo === 'ano') {
        const dataAtual = new Date();
        const anoAtual = dataAtual.getFullYear();
        const idadeMaxima = anoAtual - 120;
        
        const anoValido = verificarAno(valor, anoAtual, idadeMaxima);
        const mensagemIdade = 'Você precisa ter 18 anos ou mais.';
        const mensagemAno = 'Insira um ano válido.';

        if (anoValido) {
            $('#alert-data-ano').addClass('d--none');
        } else {

        const mensagemErro = valor <= anoAtual && valor >= idadeMaxima ? mensagemIdade : mensagemAno;
            exibirAlerta('#alert-data-ano', mensagemErro);
        }
    }
}