<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class participa {

            public static function getParticipa() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("https://dadosabertos.camara.leg.br/arquivos/eventosPresencaDeputados/json/eventosPresencaDeputados-2018.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                {             
                    $idEvento  = $e['idEvento'];
                    $idDeputado = $e['idDeputado'];
                    
            
                    $query = "INSERT INTO participa
                                (idEvento, idDeputado)
                                VALUES
                                (:idEvento, :idDeputado)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idEvento', $idEvento);
                    $statement->bindValue(':idDeputado', $idDeputado);
                    
                    $statement->execute();
                    $statement->closeCursor();
                } 
            }
        }
    ?>    
    </body>
</html>


