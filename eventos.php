<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class eventos {

            public static function getEventos() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("https://dadosabertos.camara.leg.br/arquivos/eventos/json/eventos-2018.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                { 
                    $idEvento =$e['id'];
                    $dataHoraInicio = $e['dataHoraInicio'];
                    $situacao = utf8_decode($e['situacao']);
                    $descricaoTipo = utf8_decode($e['descricaoTipo']);
                
                    $query = "INSERT INTO eventos
                                (idEvento, dataHoraInicio, situacao, descricaoTipo)
                            VALUES
                                (:idEvento, :dataHoraInicio, :situacao ,:descricaoTipo)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idEvento', $idEvento);
                    $statement->bindValue(':dataHoraInicio', $dataHoraInicio);
                    $statement->bindValue(':situacao', $situacao);
                    $statement->bindValue(':descricaoTipo', $descricaoTipo);
                    
                    $statement->execute();
                    $statement->closeCursor();
                } 
            }
        }
    
    
    ?>    
    </body>
</html>


