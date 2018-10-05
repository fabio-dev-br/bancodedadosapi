



            <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->




<html>
    <head>
        <meta charset="UTF-8">
        <title>Banco Dados Deputados Federais</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* css especifico para esta view */
            html, body {
                /* Aqui esta a imagem de fundo */
                background-image : url("inicial.jpg");
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content {
                text-align: center;
                margin:15%;
            }
        </style>
    </head>
    <body>   
        <div class="content">
            <a href="exc_todos.php" class="btn btn-large btn-primary">Executar Tudo</a> <hr/>
            <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Executar separado
    </button>
    <ul class="dropdown-menu">
      <li><a href="exc_orgaos.php">1-Orgãos</a></li>
      <li><a href="exc_eventos.php">1-Eventos</a></li>
      <li><a href="exc_legislatura.php">1-Legislatura</a></li>
      <li><a href="exc_deputados.php">2-Deputados</a></li>
      <li><a href="exc_participa.php">3-Participa</a></li>
      <li><a href="exc_proposicoes.php">4-Proposições</a></li>
      <li><a href="exc_proposicoes_autores.php">5-Proposições Autores</a></li>
    </ul>
  </div>
</div>
        </div>
        
    </body>
</html>
