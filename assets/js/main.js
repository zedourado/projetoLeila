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

function formatarData(dataString) {
    const data = new Date(dataString + 'T00:00:00'); // Adiciona o "T00:00:00" para garantir que a data seja interpretada corretamente
    const dia = String(data.getDate()).padStart(2, '0');
    const mes = String(data.getMonth() + 1).padStart(2, '0'); // Meses começam do 0
    const ano = data.getFullYear();
    return `${dia}/${mes}/${ano}`;
}

function formatarHora(horaString) {
    // Garantir que o valor seja no formato HH:mm:ss
    const [horas, minutos, segundos] = horaString.split(':');
    
    return `${horas}h${minutos}`;
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

    const formLogin = document.getElementById('formLogin');
    formData = new FormData(formLogin);

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

    fetch('../control/control_clientes.php', {
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

//VIACEP CLIENTE
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

//VIACEP COLABORADORES
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("COLAB_CEP").addEventListener("blur", function() {
        let cep = this.value.replace(/\D/g, "");

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById("COLAB_UF").value = data.uf;
                        document.getElementById("COLAB_CIDADE").value = data.localidade;
                        document.getElementById("COLAB_BAIRRO").value = data.bairro;
                        document.getElementById("COLAB_LOGRADOURO").value = data.logradouro;
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

    $('#listAgendamentosCliente').modal('hide');

    const formData = new FormData();
    formData.append('cmd', 'viewEvento');
    formData.append('EVENTO_ID', id);

    fetch('control/control_agenda.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
            const evento = data.evento;

            document.getElementById('dataEvento').innerHTML = `<i class="bi bi-calendar-event"></i> ${formatarData(evento.EVENTO_DATA)}`;
            document.getElementById('horaEvento').innerHTML = `<i class="bi bi-clock"></i> ${formatarHora(evento.EVENTO_HORA)}`;

            const servicos = evento.EVENTO_SERVICOS; 
            const servicosArray = servicos.split(", ").map(item => item.trim());

            const allDivs = document.querySelectorAll('.tipoServicoCard');
            allDivs.forEach(div => {
                div.style.display = 'none'; 
            });

            servicosArray.forEach(servico => {
                switch(servico) {
                    case "CORTE":
                        document.getElementById("serCorte").style.display = "block";
                        break;
                    case "UNHAS":
                        document.getElementById("serUnhas").style.display = "block";
                        break;
                    case "TINTURA":
                        document.getElementById("serTintura").style.display = "block";
                        break;
                    case "SPA":
                        document.getElementById("serSpa").style.display = "block";
                        break;
                    default:
                        break;
                }
            });

            document.getElementById('responsavelEvento').innerHTML = `<i class="bi bi-person"></i> ${evento.COLAB_NOME}`;

            let statusEvento = evento.EVENTO_STATUS;

            switch(statusEvento){

                case "PENDENTE":
                    document.getElementById('statusEvento').innerHTML = `<i class="bi bi-hourglass" style="color:orange"></i> Pendente`;
                break;

                case "CONFIRMADO":
                    document.getElementById('statusEvento').innerHTML = `<i class="bi bi-check" style="color:green></i> Confirmado`;
                break;

                case "CANCELADO":
                    document.getElementById('statusEvento').innerHTML = `<i class="bi bi-x" style="color:red></i> Cancelado`;
                break;
            }


            const btnCancelarEvento = document.getElementById('btnCancelarEvento');
            const btnEditarEvento = document.getElementById('btnEditarEvento');

            btnCancelarEvento.addEventListener('click', () => cancelarEvento(evento.EVENTO_ID, evento.EVENTO_DATA));
            btnEditarEvento.addEventListener('click', () => editarEvento(evento.EVENTO_ID, evento.EVENTO_DATA));
    })

    $('#viewAgendamento').modal('show');

}

function listClientes(){

    const formData = new FormData();
    formData.append('cmd', 'listClientes');

    fetch('../control/control_clientes.php', {
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

    fetch('../control/control_clientes.php', {
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

function viewColaborador(id){

    $('#listClientes').modal('hide');

    const formData = new FormData();
    formData.append('cmd', 'viewColaborador');
    formData.append('COLAB_ID', id);

    fetch('../control/control_colaboradores.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {

            const colaborador = data.colaborador;

            document.getElementById('nomeColaborador').value = colaborador.COLAB_NOME;
            document.getElementById('sexoColaborador').value = colaborador.COLAB_SEXO;
            document.getElementById('nascColaborador').value = colaborador.COLAB_NASCIMENTO;

            document.getElementById('CEPColaborador').value = colaborador.COLAB_CEP;
            document.getElementById('ruaColaborador').value = colaborador.COLAB_LOGRADOURO;
            document.getElementById('numeroColaborador').value = colaborador.COLAB_NUMERO;
            document.getElementById('complementoColaborador').value = colaborador.COLAB_COMPLEMENTO;
            document.getElementById('bairroColaborador').value = colaborador.COLAB_BAIRRO;
            document.getElementById('cidadeColaborador').value = colaborador.COLAB_CIDADE;
            document.getElementById('UFColaborador').value = colaborador.COLAB_UF;

            document.getElementById('emailColaborador').value = colaborador.COLAB_EMAIL;
            document.getElementById('telefoneColaborador').value = colaborador.COLAB_TELEFONE;
            document.getElementById('celularColaborador').value = colaborador.COLAB_CELULAR;

    })

    $('#viewColaborador').modal('show');

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
                let statusColor, statusIcon;
                
                // Usando switch para definir o status
                switch (evento.EVENTO_STATUS) {
                    case 'PENDENTE':
                        statusColor = 'orange';
                        statusIcon = 'bi-hourglass';  // Você pode alterar o ícone de acordo com o status
                        break;
                    case 'CANCELADO':
                        statusColor = 'red';
                        statusIcon = 'bi-x-circle';  // Alterando ícone para cancelar
                        break;
                    case 'CONFIRMADO':
                        statusColor = 'green';
                        statusIcon = 'bi-check-circle';  // Ícone para status confirmado
                        break;
                    case 'FINALIZADO':
                        statusColor = 'blue';
                        statusIcon = 'bi-check-all';  // Ícone para finalizado
                        break;
                    default:
                        statusColor = 'gray';
                        statusIcon = 'bi-question-circle';  // Ícone genérico para status desconhecido
                        break;
                }

                const card = `
                    <div class="col-12 m-2 cardAgendamento" onclick="viewAgendamento(${evento.EVENTO_ID})">
                        <div class="row">
                            <div class="col-7">
                                <p><i class="bi bi-calendar-event"></i> ${formatarData(evento.EVENTO_DATA)} - ${formatarHora(evento.EVENTO_HORA)}</p>
                            </div>
                            <div class="col-5">
                                <i class="bi ${statusIcon}" style="color: ${statusColor}"></i> ${evento.EVENTO_STATUS}
                            </div>
                        </div>
                    </div>
                `;
            
                listAgendamentos.innerHTML += card;
            });
            

    })

    $('#listAgendamentosCliente').modal('show');

}

function listAgendamentosAdmin(id){

    const formData = new FormData();
    formData.append('cmd', 'listEventos');

    fetch('../control/control_agenda.php', {
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

    $('#listAgendamentosColaborador').modal('show');

}

function cancelarEvento(id, dataAgendada) {

    const dataAtual = new Date();
    const dataEvento = new Date(dataAgendada);
    const diffTime = dataEvento - dataAtual;
    const diffDays = diffTime / (1000 * 3600 * 24);

    Swal.fire({
        title: "Cancelar Agendamento",
        text: "Você tem certeza que gostaria de Cancelar esse Agendamento?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim",
        cancelButtonText: "Não"
    }).then((result) => {
        if (result.isConfirmed) {
            if (diffDays <= 2) {
                Swal.fire({
                    title: "Cancelamento Não Permitido",
                    text: "O cancelamento só pode ser feito com antecedência de 2 dias. Por favor, entre em contato com o salão.",
                    icon: "error"
                });
            } else {
                cancelamentoEvento(id);               
            }
        }
    });
}

function cancelamentoEvento(id) {

    const formData = new FormData();
    formData.append('cmd', 'cancelarEvento');
    formData.append('EVENTO_ID', id);

    fetch('control/control_agenda.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success === true) {
            Swal.fire({
                title: data.message,
                icon: "success"
            });
        }else{
            Swal.fire({
                title: data.message,
                icon: "success"
            });

        }
    })
}

function listConfirmadosIndexCliente(id){

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

            const listAgendamentos = document.getElementById('listConfirmadosCliente');
            listAgendamentos.innerHTML = '';
    
            eventos.forEach(evento => {
                let statusColor, statusIcon;
                
                // Usando switch para definir o status
                switch (evento.EVENTO_STATUS) {
                    case 'PENDENTE':
                        statusColor = 'orange';
                        statusIcon = 'bi-hourglass';  // Você pode alterar o ícone de acordo com o status
                        break;
                    case 'CANCELADO':
                        statusColor = 'red';
                        statusIcon = 'bi-x-circle';  // Alterando ícone para cancelar
                        break;
                    case 'CONFIRMADO':
                        statusColor = 'green';
                        statusIcon = 'bi-check-circle';  // Ícone para status confirmado
                        break;
                    case 'FINALIZADO':
                        statusColor = 'blue';
                        statusIcon = 'bi-check-all';  // Ícone para finalizado
                        break;
                    default:
                        statusColor = 'gray';
                        statusIcon = 'bi-question-circle';  // Ícone genérico para status desconhecido
                        break;
                }

                const card = `
                    <div class="col-12 m-2 cardAgendamento" onclick="viewAgendamento(${evento.EVENTO_ID})">
                        <div class="row">
                            <div class="col-7">
                                <p><i class="bi bi-calendar-event"></i> ${formatarData(evento.EVENTO_DATA)} - ${formatarHora(evento.EVENTO_HORA)}</p>
                            </div>
                            <div class="col-5">
                                <i class="bi ${statusIcon}" style="color: ${statusColor}"></i> ${evento.EVENTO_STATUS}
                            </div>
                        </div>
                    </div>
                `;
            
                listAgendamentos.innerHTML += card;
            });
            

    })
}

function listColaboradores(){

    const formData = new FormData();
    formData.append('cmd', 'listColaboradores');

    fetch('../control/control_colaboradores.php', {
        method: 'POST',
        body: formData 
    })
    .then(response => response.json()) 
    .then(data => {

            const colaboradores = data.colaboradores;

            const tbody = document.getElementById('tbodyColaboradoresList');
            tbody.innerHTML = '';
    
            colaboradores.forEach(colab => {
                const row = `
                    <tr>
                        <th scope="row">${colab.COLAB_ID}</th>
                        <td>${colab.COLAB_NOME}</td>
                        <td>${colab.COLAB_EMAIL}</td>
                        <td>
                            <button onclick="viewColaborador(${colab.COLAB_ID})" class="btn btn-sm btn-primary" type="button">
                                <i class="bi bi-eye"></i> Visualizar
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

    })

    $('#listColaboradores').modal('show');

}
