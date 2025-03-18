<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <!-- CSS Bootstrap 5.3 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- SweetAlert 2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script JS -->
    <script src="../assets/js/main.js"></script>

    <title>Portal do Cliente | Cabeleleira Leila - Salão de Beleiza</title>
</head>
<body id="bodyLogin">
    <div class="login-box">
        <img id="logoLogin" src="../assets/img/logo.png">
        <h2 style="color: #9b846e">Acesso Administrativo</h2>
        <form id="formLogin">
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>
            <button type="button" onclick="validarLogin()" class="btn btn-sm btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
        </form>
    </div>
</body>
</html>