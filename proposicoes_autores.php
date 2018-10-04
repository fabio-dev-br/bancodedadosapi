<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class proposicoes_autores {

            public static function getProposicoesAutores() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("https://dadosabertos.camara.leg.br/arquivos/proposicoesAutores/json/proposicoesAutores-2018.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                {          
                    $idProposicao  = $e['idProposicao'];
                    $idAutor = $e['idAutor'];
                    $siglaPartido= $e['siglaPartidoAutor'];
                    
                    $query = "INSERT INTO proposicoes_autores
                                (idProposicao, idAutor, siglaPartido)
                                VALUES
                                (:idProposicao, :idAutor, :siglaPartido)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idProposicao', $idProposicao);
                    $statement->bindValue(':idAutor', $idAutor);
                    $statement->bindValue(':siglaPartido', $siglaPartido);
                    
                    $statement->execute();
                    $statement->closeCursor();
                } 
            }
        }
    ?>    
    </body>
</html>


