<?php

session_start();

include('protect.php');
include('conection_bd.php');

// Consulta para obter as músicas do banco de dados
$sql = "SELECT nome, caminho, tamanho FROM midia";
$result = $mysqli->query($sql);

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
  <link rel="stylesheet" type="text/css" href="css/dash_style.css">

  <title>Dashboard - PulseTunes</title>
  <link rel="icon" href="imagens/headphones_headphone_romance_love_earphones_icon_258592.png">
</head>

<body>

  <div class="sidebar"> <!-- Barra lateral -->
    <div class="logo d-flex justify-content-center align-items-center">
      <a href="#">
        <img src="imagens/Pulse -logo.png" alt="Logo" />
      </a>
    </div>

    <div class="navigation d-flex justify-content-center align-items-center"> <!-- Navegação -->
      <ul>
        <li>
          <a href="dashboard.php">
            <span class="icon"><i class="fa fas fa-home"></i></span>
            <span class="title">Home</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"><i class="fa fas fa-search"></i></span>
            <span class="title">Buscar</span>
          </a>
        <li>
        <li>
          <a href="#">
            <span class="icon"><i class="fa fas fa-book"></i></span>
            <span class="title">Biblioteca</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"><i class="fa fas fa-plus-square"></i></span>
            <span class="title">Playlist</span>
          </a>
        </li>
        <li>
          <form action="delete_account.php" method="post" id="deleteAccountForm">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
            <a href="#" onclick="confirmDelete()">
              <span class="icon"><i class="fa fa-times-circle"></i></span>
              <span class="title">Excluir conta</span>
            </a>
          </form>
        </li>
      </ul>
    </div> <!-- Fim da navegação -->

    <div class="policies d-flex justify-content-center"> <!-- Políticas -->
      <ul>
        <li>
          <a href="#">Cookies</a>
        </li>
        <li>
          <a href="#">Privacy</a>
        </li>
      </ul>
    </div> <!-- Fim das políticas -->
  </div> <!-- Fim da barra lateral -->

  <div class="main-container"> <!-- Container principal -->

    <div class="topbar"> <!-- Barra superior -->
      <div class="prev-next-buttons">
        <button class="prev"><i class="fa fas fa-chevron-left"></i></button>
        <button class="next"><i class="fa fas fa-chevron-right"></i></button>
      </div>
      <div class="navbar"> <!-- Barra de navegação -->
        <ul>
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="form.html">Premium</a>
          </li>
          <li class="divider">|</li>
          <a href="logout.php">
            <button type="button">Log Out</button> <!-- Botão de logout que preciso configurar no PHP -->
          </a>
        </ul>
      </div> <!-- Fim da barra de navegação -->
    </div> <!-- Fim da barra superior -->

    <div class="pulsetunes-playlist"> <!-- Playlist -->
      <h2>PulseTunes Playlist</h2>
      <div class="container d-flex flex-wrap">
        <?php
        // Verifique se há resultados
        if ($result->num_rows > 0) {
          $counter = 1;

          // Loop pelos resultados e gerar os elementos HTML
          while ($row = $result->fetch_assoc()) {
            echo '<div class="list"> <!-- Lista de músicas -->';
            echo '<div class="item">';
            echo '<img src="imagens/Pulse3.png" />';
            echo '<div class="play" data-src="' . $row['caminho'] . '"> <!-- Botão de play -->';
            echo '<span class="icon"><i class="fa fa-play"></i></span>';
            echo '</div>';
            echo "<h4 class='text-center'>Top $counter</h4>";
            echo "<p class='text-center'>{$row['nome']}</p>"; // Adapte conforme necessário
            echo '<div class="pause text-center mt-3"> <!-- Botão de pausa -->';
            echo '<span class="icon"><i class="fa fa-pause text-white"></i></span>';
            echo '</div>';
            echo '</div>';
            echo '</div> <!-- Fim da lista de músicas -->';

            $counter++;
          }
        } else {
          echo "Nenhuma música encontrada no banco de dados.";
        }
        ?>
      </div>
    </div> <!-- Fim da Playlist -->

    <div class="preview"> <!-- Preview -->
      <div class="text">
        <h6>versão limitada</h6>
        <p>Assine nossa versão Premium do PulseTunes para obter acesso ilimitado às nossas faixas. </p>
      </div>
      <div class="button d-flex align-items-center justify-content-center">
        <a href="form.html">
          <button type="button">Assine agora</button>
        </a>
      </div>
    </div> <!-- Fim do Preview -->

    <audio id="player" src=""></audio> <!-- Player de áudio -->

    <script>
      // Script para reproduzir e pausar as músicas
      window.onload = function() {
        var player = document.getElementById('player');
        var playButtons = document.getElementsByClassName('play');
        var pauseButtons = document.getElementsByClassName('pause');

        for (var i = 0; i < playButtons.length; i++) {
          playButtons[i].addEventListener('click', function() {
            var src = this.getAttribute('data-src');
            console.log(src); // Debug
            player.setAttribute('src', src);
            player.play();
          });
        }

        for (var i = 0; i < pauseButtons.length; i++) {
          pauseButtons[i].addEventListener('click', function() {
            player.pause();
          });
        }
      };
    </script>

    <script>
      // Script para confirmar a exclusão da conta
      function confirmDelete() {
        if (confirm("Tem certeza de que deseja excluir sua conta?")) {
          document.getElementById('deleteAccountForm').submit();
        }
      }
    </script>
  </div>


  <!-- JavaScript (Opcional) -->
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>