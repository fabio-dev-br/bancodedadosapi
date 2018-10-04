<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class orgaos {

            public static function getOrgaos() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("http://dadosabertos.camara.leg.br/arquivos/orgaos/json/orgaos.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                {             
                    $idOrgaos  = substr( $e['uri'],49);
                    $sigla = utf8_decode($e['sigla']);
                    $nome = utf8_decode($e['nome']);
                    $casa = utf8_decode($e['casa']);
                
                    $query = "INSERT INTO orgaos
                                (idOrgao, sigla, nome, casa)
                            VALUES
                                (:idOrgaos, :sigla, :nome ,:casa)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idOrgaos', $idOrgaos);
                    $statement->bindValue(':sigla', $sigla);
                    $statement->bindValue(':nome', $nome);
                    $statement->bindValue(':casa', $casa);
                    $statement->execute();
                    $statement->closeCursor();
                } 
            }
        }
    
    ?>    
    </body>
</html>


