<?php
session_start();

include('conection_bd.php');

// Verifica se a mensagem está definida e a exibe
if (isset($_SESSION['message'])) {
  echo "<script>alert('" . $_SESSION['message'] . "')</script>";
  unset($_SESSION['message']);
}

// Verifica se a senha foi redefinida e exibe a mensagem
if (isset($_SESSION['senha_redefinida'])) {
  echo "<script>alert('Senha redefinida com sucesso.')</script>";
  unset($_SESSION['senha_redefinida']);
}

// Verifica se o usuário está logado
if (isset($_POST['email']) && isset($_POST['senha'])) {
  if (strlen($_POST['email']) == 0) {
    echo "<script>alert('Por favor, digite seu e-mail.')</script>";
  } else if (strlen($_POST['senha']) == 0) {
    echo "<script>alert('Por favor, digite sua senha.')</script>";
  } else {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Busca o usuário no banco de dados
    $sql_code = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
      echo "<script>alert('E-mail ou senha incorretos.')</script>";
    } else {
      $user = $result->fetch_assoc();

      // Verifica a senha
      if (password_verify($senha, $user['senha'])) {
        // A senha está correta, inicia a sessão
        $_SESSION['id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
      } else {
        echo "<script>alert('E-mail ou senha incorretos.')</script>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- HTML5Shiv -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

  <!-- Estilo customizado -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Login - PulseTunes</title>
  <link rel="icon" href="imagens/headphones_headphone_romance_love_earphones_icon_258592.png">
</head>

<body>

  <header><!--início cabeçalho-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
      <div class="container">

        <a href="index.html" class="navbar-brand">
          <img src="imagens/headphone.svg" width="120">
          <span class="site-title">Pulse<span style="color: #51caef;">-Tunes-</span></span>
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
          <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="nav-principal">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="form.html">Premium</a>

            <li class="nav-item divisor"></li>

            <li class="nav-item">
              <a class="nav-link" href="signup.html">Inscreva-se</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Entrar</a>
          </ul>
        </div>

      </div>
    </nav>
  </header><!--fim cabeçalho-->

  <section id="home" class="d-flex"><!--início home-->
    <div class="container align-self-center"><!--início container-->
      <!-- Formulário de Intenção de Assinatura -->
      <div class="formulario mx-auto col-12 col-md-6">
        <h2>Entrar no PulseTunes</h2>

        <form method="POST" action="login.php" id="signup-form"><!-- Aqui preciso direcionar o usuário para a dashboard -->
          <div class="campo">
            <input type="email" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="campo">
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
          </div>
          <div class="campo">
            <input type="submit" class="btn btn-custom btn-roxo btn-block mx-auto" value="Entrar">
          </div>
          <hr> <!-- Divisória -->
          <div class="campo text-center">
            <a href="forgotpass.html" class="text-decoration-underline font-weight-bold text-white">Esqueci a senha</a>
          </div>
        </form><!--/Formulário-->

      </div><!--/Formulário de Intenção de Assinatura-->
    </div><!--/Fim container-->

  </section><!--fim home-->

  <footer><!--início rodapé-->
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <img src="imagens/Pulse Tunes- LogoSite (1).png" width="130">
        </div>
        <div class="col-md-2">
          <h4>Company</h4>
          <ul class="navbar-nav">
            <li><a href="">Sobre</a></li>
            <li><a href="">Novidades</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h4>Comunidades</h4>
          <ul class="navbar-nav">
            <li><a href="">Artistas</a></li>
            <li><a href="">Desenvolvedores</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h4>Links úteis</h4>
          <ul class="navbar-nav">
            <li><a href="">Ajuda</a></li>
            <li><a href="">Formulário</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul>
            <li><a class="centralizar" href="https://github.com/NaatyG"><img src="imagens/circle-github.png" width="60"></a></li>
            <li><a class="centralizar" href=""><img src="imagens/logo_you_tube_icon-icons.com_59065.png" width="60"></a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </footer><!--fim rodapé-->

  <!-- JavaScript (Opcional) -->
  <script src="script.js"></script>
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>