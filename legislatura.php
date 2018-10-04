<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class legislatura {

            public static function getLegislatura() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("http://dadosabertos.camara.leg.br/arquivos/legislaturas/json/legislaturas.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                {             
                    $idLegislatura  = $e['idLegislatura'];
                    $dataInicio = $e['dataInicio'];
                    $dataFim = $e['dataFim'];
                    $anoEleicao = $e['anoEleicao'];
                    
                    $query = "INSERT INTO legislatura
                                (idLegislatura, dataInicio, dataFim, anoEleicao)
                            VALUES
                                (:idLegislatura, :dataInicio, :dataFim, :anoEleicao)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idLegislatura', $idLegislatura);
                    $statement->bindValue(':dataInicio', $dataInicio);
                    $statement->bindValue(':dataFim', $dataFim);
                    $statement->bindValue(':anoEleicao', $anoEleicao);
                    $statement->execute();
                    $statement->closeCursor();
                }
            }
        }     
    ?>    
    </body>
</html>


