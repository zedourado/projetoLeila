<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
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
    <script src="assets/js/main.js"></script>

    <title>Portal do Cliente | Cabeleleira Leila - Salão de Beleza</title>
</head>
<body id="bodyLogin">
    <div class="login-box">
        <img id="logoLogin" src="assets/img/logo.png">
        <h2 style="color: #9b846e">Portal do Cliente</h2>
        <form id="formLogin">
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>
            <button type="button" onclick="validarLogin()" class="btn btn-sm btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
        </form>
        <br>
        <small>Ainda não tem cadastro? Clique no botão abaixo:</small>
        <button type="button" data-bs-toggle="modal" data-bs-target="#cadastroLogin" class="btn btn-sm btn-primary w-100"><i class="bi bi-person-plus"></i> Cadastre-se</button>
    </div>

</body>
</html>

    <!-- Modais -->
    <?php require_once('control/modals.php'); ?>