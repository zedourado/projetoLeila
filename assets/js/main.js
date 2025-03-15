function buttonTest(event){
    // Prevenir qualquer ação do formulário (se houver)
    event.preventDefault();

    // Exibir o alerta SweetAlert2
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
    });
}


function validarLogin(){

    const formLoginCliente = document.getElementById('formLoginCliente');
    formData = new FormData(formLoginCliente);

    fetch('control/validarLogin.php', {
        method: 'POST',  // Método HTTP
        body: formData  // Envia os dados como form-data
    })
    .then(response => response.json())  // Converte a resposta para JSON
    .then(data => {
        if (data.success) {
            // Redireciona ou faz algo após o login bem-sucedido
            alert('Login realizado com sucesso!');
            window.location.href = 'index.php';  // Exemplo de redirecionamento
        } else {
            // Exibe erro, caso o login falhe
            alert('Erro no login: ' + data.message);
        }
    })

}