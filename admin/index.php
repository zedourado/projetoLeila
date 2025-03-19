<?php require_once('control/validarSessao.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <!-- Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- SweetAlert 2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Script JS -->
    <script src="../assets/js/main.js"></script>
    <title>Área Administrativa | Cabeleleila Leila - Salão de Beleiza</title>
    <style>
        /* Adicionando as alterações conforme CSS que forneci acima */
    </style>
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="mb-0" id="relogio"></p>
            </div>
            <div>
                <h5>Cabeleleila Leila - Salão de Beleiza</h5>
            </div>
            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" style="width: 200px;">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-key"></i> Alterar Senha</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../control/logout.php"><i class="bi bi-door-closed"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="content">
    <div class="sidebar">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Painel Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class="bi bi-house"></i> Início</a>
            </li>
            <li>
                <a onclick="listClientes()" class="nav-link text-white"><i class="bi bi-people"></i> Clientes</a>
            </li>
            <li>
                <a onclick="listColaboradores()" class="nav-link text-white"><i class="bi bi-person-badge"></i> Colaboradores</a>
            </li>
            <li>
                <a onclick="listAgendamentosAdmin(<?php echo $_SESSION['COLAB_ID']; ?>)" class="nav-link text-white"><i class="bi bi-calendar3-week"></i> Agendamentos</a>
            </li>
            <li>
                <a href="#" class="nav-link text-white"><i class="bi bi-door-closed"></i> Sair</a>
            </li>
        </ul>
        <hr>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h4>Olá <?php echo $_SESSION['COLAB_NOME']; ?></h4>
        <div class="mt-5">
            <h5>Agendamentos Confirmados:</h5>
            <div class="row d-flex">
                <div class="col-4 m-2 cardAgendamento" onclick="viewAgendamento(1)">
                    <div class="row">
                        <div class="col-8">
                        <p><i class="bi bi-calendar-event"></i> 01/01/0001 - 00h00</p>
                        </div>
                        <div class="col-4"><i class="bi bi-check" style="color: green"></i> Confirmado</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
    <div class="col-md-12 d-flex justify-content-center align-items-center text-center">
      <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Developed by José Dourado</span>
    </div>
</footer>
</body>
</html>

    <!-- Modais -->
    <?php require_once('../control/modals.php'); ?>
