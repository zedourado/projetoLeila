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

//Data Breadcumbs
window.onload = setInterval(horario, 1000);
function horario() {
  var relogio = document.getElementById('relogio');
  var d = new Date();
  var seg = d.getSeconds().toString().padStart(2, '0');
  var min = d.getMinutes().toString().padStart(2, '0');
  var hr = d.getHours().toString().padStart(2, '0');
  var dia = d.getDate().toString().padStart(2, '0');
  var mes = d.getMonth();
  var ano = d.getFullYear();
  var meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
  var diaSem = d.getDay();
  var diasSemana = ["Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado"];

  relogio.innerHTML = diasSemana[diaSem] + ", " + dia + " de " + meses[mes] + " de " + ano + " " + hr + ":" + min + ":" + seg;
}
  

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

function viewAgendamento(id){

    const formData = new FormData();
    formData.append('cmd', 'addCliente');
    formData.append('EVENTO_ID', id);

    fetch('control/control_agenda.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success === true) {
            const evento = data.evento;



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

    $('#viewAgendamento').modal('show');

}

function listClientes(){

    const formData = new FormData();
    formData.append('cmd', 'listClientes');

    fetch('control/control_clientes.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {

            const clientes = data.clientes;

            const tbody = document.getElementById('tbodyClientesList');
            tbody.innerHTML = '';
    
            clientes.forEach(cliente => {
                const row = `
                    <tr>
                        <th scope="row">${cliente.CLIENTE_ID}</th>
                        <td>${cliente.CLIENTE_NOME}</td>
                        <td>${cliente.CLIENTE_EMAIL}</td>
                        <td>
                            <button onclick="viewCliente(${cliente.CLIENTE_ID})" class="btn btn-sm btn-primary" type="button">
                                <i class="bi bi-eye"></i> Visualizar
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

    })

    $('#listClientes').modal('show');

}

function viewCliente(id){

    $('#listClientes').modal('hide');

    const formData = new FormData();
    formData.append('cmd', 'viewCliente');
    formData.append('CLIENTE_ID', id);

    fetch('control/control_clientes.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {

            const cliente = data.cliente;

            document.getElementById('nomeCliente').value = cliente.CLIENTE_NOME;
            document.getElementById('sexoCliente').value = cliente.CLIENTE_SEXO;
            document.getElementById('nascCliente').value = cliente.CLIENTE_NASCIMENTO;

            document.getElementById('CEPCliente').value = cliente.CLIENTE_CEP;
            document.getElementById('ruaCliente').value = cliente.CLIENTE_LOGRADOURO;
            document.getElementById('numeroCliente').value = cliente.CLIENTE_NUMERO;
            document.getElementById('complementoCliente').value = cliente.CLIENTE_COMPLEMENTO;
            document.getElementById('bairroCliente').value = cliente.CLIENTE_BAIRRO;
            document.getElementById('cidadeCliente').value = cliente.CLIENTE_CIDADE;
            document.getElementById('UFCliente').value = cliente.CLIENTE_UF;

            document.getElementById('emailCliente').value = cliente.CLIENTE_EMAIL;
            document.getElementById('telefoneCliente').value = cliente.CLIENTE_TELEFONE;
            document.getElementById('celularCliente').value = cliente.CLIENTE_CELULAR;

    })

    $('#viewCliente').modal('show');

}

function openModalAddCliente(id){

    $('#listAgendamentosCliente').modal('hide');

    $('#addEventoCliente').modal('show');

}

function addEventoCliente(id){

    const formCadastroLogin = document.getElementById('formAddEventoCliente');
    const formData = new FormData(formCadastroLogin);
    formData.append('cmd', 'addEvento');
    formData.append('CLIENTE_ID', id);

    fetch('control/control_agenda.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success === true) {
            $('#addEventoCliente').modal('hide');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 2000
              });
              listAgendamentosCliente(id);
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

function listAgendamentosCliente(id){

    const formData = new FormData();
    formData.append('cmd', 'listEventosCliente');
    formData.append('CLIENTE_ID', id);

    fetch('control/control_agenda.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {

            const eventos = data.eventos;

            const listAgendamentos = document.getElementById('listAgendamentos');
            listAgendamentos.innerHTML = '';
    
            eventos.forEach(evento => {
                const card = `
                    <div class="col-6 m-2 cardAgendamento" onclick="viewAgendamento(${evento.EVENTO_ID})">
                        <div class="row">
                            <div class="col-8">
                                <p><i class="bi bi-calendar-event"></i> ${evento.EVENTO_DATA} - ${evento.EVENTO_HORA}</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-hourglass" style="color: ${evento.EVENTO_STATUS === 'PENDENTE' ? 'orange' : 'green'}"></i> ${evento.EVENTO_STATUS}
                            </div>
                        </div>
                    </div>
                `;
            
                listAgendamentos.innerHTML += card;
            });
            

    })

    $('#listAgendamentosCliente').modal('show');

}

