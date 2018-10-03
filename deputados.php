<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
gastos:
http://www.camara.leg.br/cotas/Ano-2017.json.zip



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('max_execution_time', 300);
        include_once "database.php";
        $db = database::getDB();  
        $json_file = file_get_contents("http://dadosabertos.camara.leg.br/arquivos/deputados/json/deputados.json");   
        $json_str = json_decode($json_file, true);
        $itens = $json_str['dados'];

        foreach ( $itens as $e ) 
         { 
        $uri = substr($e['uri'],52);
         echo $uri."<br>";         
         //$nome = $e['nome'];
         $nomeCivil = $e['nomeCivil'];
         $ufNascimento = $e['ufNascimento'];
         $query = 'INSERT INTO deputados
                     (nome, nomeCivil, ufNascimento)
                  VALUES
                     (:uri, :nomeCivil, :ufNascimento)';
        $statement = $db->prepare($query);
        $statement->bindValue(':uri', $uri);
        $statement->bindValue(':nomeCivil', $nomeCivil);
        $statement->bindValue(':ufNascimento', $ufNascimento);
        $statement->execute();
        $statement->closeCursor();
    } 
  
    ?>    
    </body>
</html>


