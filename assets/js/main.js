//FUNCTION TEST BUTTON ACTION
function buttonTest(event){
    // Exibir o alerta SweetAlert2
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
    });
}

//JQuery Masks
$(document).ready(function(){
    $("#CLIENTE_CEP").mask("00000-000"); // Aplica a máscara no campo CEP
    $('#CLIENTE_TELEFONE').mask('(99) 9999-9999');
    $('#CLIENTE_CELULAR').mask('(99) 99999-9999');
});

function validarLogin(){

    const formLoginCliente = document.getElementById('formLoginCliente');
    formData = new FormData(formLoginCliente);

    fetch('control/validarLogin.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success === true) {
            // Redireciona após o login bem-sucedido
            window.location.href = 'index.php'; 
        } else {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: data.message,
                showConfirmButton: false,
                timer: 2000
              });
        }
    })

}

function cadastroClienteLogin(){

    const formCadastroLogin = document.getElementById('formCadastroLogin');
    const formData = new FormData(formCadastroLogin);
    formData.append('cmd', 'addCliente');

    fetch('control/control_clientes.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success === true) {
            $('#cadastroLogin').modal('hide');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 2000
              });
        } else {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: data.message,
                showConfirmButton: false,
                timer: 2000
              });
        }
    })
}

//ADD ENDEREÇO AUTOMATICO COM VIACEP
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("CLIENTE_CEP").addEventListener("blur", function() {
        let cep = this.value.replace(/\D/g, "");

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById("CLIENTE_UF").value = data.uf;
                        document.getElementById("CLIENTE_CIDADE").value = data.localidade;
                        document.getElementById("CLIENTE_BAIRRO").value = data.bairro;
                        document.getElementById("CLIENTE_LOGRADOURO").value = data.logradouro;
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "CEP não encontrado!",
                            showConfirmButton: false,
                            timer: 2000
                          });
                    }
                })
                .catch(error => console.error("Erro ao buscar o CEP:", error));
        } else {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "CEP Inválido!",
                showConfirmButton: false,
                timer: 2000
              });
        }
    });
});


