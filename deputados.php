<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class deputados {

            public static function getDeputados() {

                set_time_limit(300);
                
                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("http://dadosabertos.camara.leg.br/arquivos/deputados/json/deputados.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];        
                
                foreach ( $itens as $e){ 
                
                $uri = substr( $e['uri'],52);
                echo $uri."<br>";
                $nomePolitico = utf8_decode($e['nome']);
                $idLegislaturaInicial = $e['idLegislaturaInicial'];
                $idLegislaturaFinal = $e['idLegislaturaFinal'];
                $nomeCivil = utf8_decode($e['nomeCivil']);      
                $dataNascimento = $e['dataNascimento'];
                $dataFalecimento = $e['dataFalecimento'];
                $ufNascimento = $e['ufNascimento'];                
            
                $query = 'INSERT INTO deputados
                            (idDeputado, nomePolitico, idLegislaturaInicial, idLegislaturaFinal, 
                            nomeCivil , dataNascimento,  dataFalecimento, ufNascimento)
                        VALUES
                            (:uri, :nomePolitico, :idLegislaturaInicial, :idLegislaturaFinal, 
                            :nomeCivil , :dataNascimento,:dataFalecimento, :ufNascimento)';

                $statement = $db->prepare($query);

                $statement->bindValue(':uri', $uri);
                $statement->bindValue(':nomePolitico', $nomePolitico);
                $statement->bindValue(':idLegislaturaInicial', $idLegislaturaInicial);
                $statement->bindValue(':idLegislaturaFinal', $idLegislaturaFinal);
                $statement->bindValue(':nomeCivil', $nomeCivil);        
                $statement->bindValue(':dataNascimento', $dataNascimento);
                $statement->bindValue(':dataFalecimento',  $dataFalecimento);
                $statement->bindValue(':ufNascimento', $ufNascimento);
                
                $statement->execute();
                $statement->closeCursor();
                } 
            }
        }
        ?>    
    </body>
</html>



