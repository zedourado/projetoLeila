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
