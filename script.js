function getParameters() {

    var params    = new Array();
    var paramsRet = new Array();
    var url = window.location.href;     // Obtém a URL
    var paramsStart = url.indexOf("?"); // Procura ? na URL
 
    if(paramsStart != -1){ 
     // Encontrou ? na URL
      var paramString = url.substring(paramsStart + 1); // Retorna parte da URL após ?
      paramString = decodeURIComponent(paramString);    // Decodifica código de URI da URL
      var params = paramString.split("&"); // Retorna trechos da String separados por &
      for(var i = 0 ; i < params.length ; i++) {
        var pairArray = params[i].split("="); // Retorna trechos da String separados por =
        if(pairArray.length == 2){
          paramsRet[pairArray[0]] = pairArray[1];
        }
 
      }
      return paramsRet;
    }
    return null; // Não encontrou ? na URL
 }

function mascaraTelefone(event) {
    let tecla = event.key;
    // Regex: 
    // g = não termina verificação enquanto não houver combinação para todos os elementos  
    // \D+ = troca qualquer caractere que não seja um dígito por caracter vazio
    let telefone = event.target.value.replace(/\D+/g, "");

    // Regex: i = case insensitive
    // Se Tecla é número, concatena com telefone
    if (/^[0-9]$/i.test(tecla)) {
        telefone = telefone + tecla;
        let tamanho = telefone.length;

        if (tamanho >= 12) { // Se telefone com 12 ou mais caracteres, não faz mais nada
            return false;
        }

        if (tamanho > 10) { 
            telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (tamanho > 5) { 
            telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (tamanho > 2) { 
            telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            telefone = telefone.replace(/^(\d*)/, "($1");
        }

        event.target.value = telefone;
    }

    if (!["Backspace", "Delete", "Tab"].includes(tecla)) {
        return false;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    form.addEventListener('submit', function(event) {
        // Validação do nome, email, telefone e senha
        const nome = form.elements.nome.value;
        const email = form.elements.email.value;
        const telefone = form.elements.telefone.value;
        const senha = form.elements.senha.value;

        if (nome === '') {
            alert('Nome não pode ser vazio');
            event.preventDefault(); // Impedir o envio do formulário
        } else if (!emailPattern.test(email)) {
            alert('E-mail inválido');
            event.preventDefault(); // Impedir o envio do formulário
        } else if (senha.length < 6 || !/[^a-zA-Z0-9]/.test(senha)) {
            alert('A senha deve ter pelo menos 6 caracteres e incluir um caractere especial.');
            event.preventDefault(); // Impedir o envio do formulário
        }
    });
});

function retornarParaIndex() {
    window.location.href = 'index.html';
}

function typeWrite(elemento){
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = ' ';
    textoArray.forEach(function(letra, i){   
      
    setTimeout(function(){
        elemento.innerHTML += letra;
    }, 75 * i)

  });
}
const titulo = document.querySelector('.titulo-principal');
typeWrite(titulo);
