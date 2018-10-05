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
       
    ?>   
    ?>   
    ?>  