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

    <title>Música para todos - PulseTunes</title>
    <link rel="icon" href="imagens/headphones_headphone_romance_love_earphones_icon_258592.png">
</head>

<body>

    <?php
    $email = $_POST['email']; // Recebendo o valor do campo Email enviado pelo formulário
    $senha = $_POST['senha']; // Recebendo o valor do campo Senha enviado pelo formulário
    ?>

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
                            <a class="nav-link" href="login.html">Entrar</a>
                    </ul>
                </div>

            </div>
        </nav>
    </header><!--fim cabeçalho-->

    <section id="home" class="d-flex"><!--início home-->
        <div class="container align-self-center"><!--início container-->
            <div class="formulario mx-auto col-12 col-md-6">
                <h2>Aguarde o nosso contato por email!</h2>
                <script language=javascript>
                    var params = new Array();
                    params = getParameters();
                    for (let [key, value] of Object.entries(params)) {
                        document.write("<tr><td style='text-align: center;'><b>" + key + "</b></td><td>" + value + "</td></tr>");
                    }
                </script>
                <div class="campo text-center">
                    <input class="btn btn btn-custom btn-roxo mx-auto" value="Retornar" onclick="retornarParaIndex()">
                </div>
            </div>
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