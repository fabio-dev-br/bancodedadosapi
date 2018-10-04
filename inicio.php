
            
            <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->




<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('max_execution_time', 300);
        
        include_once "deputados.php";
        include_once "eventos.php";
        include_once "legislatura.php";
        include_once "orgaos.php";
        include_once "participa.php";
        include_once "proposicoes.php";
        include_once "proposicoes_autores.php";
      
        $orgaos = orgaos::getOrgaos();
        $legislatura = legislatura::getLegislatura();
        $deputados = deputados::getDeputados();
        $eventos = eventos::getEventos();    
        $participa = participa::getParticipa();
        $proposicoes = proposicoes::getProposicoes();
        $proposicoes_autores = proposicoes_autores::getProposicoesAutores();
    
  
    ?>    
    </body>
</html>