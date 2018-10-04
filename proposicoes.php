<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class proposicoes {

            public static function getProposicoes() {
        
                ini_set('max_execution_time', 300); //300 seconds = 5 minutes, definir melhor esse tempo 

                include_once "database.php";
                $db = database::getDB();  
                $json_file = file_get_contents("https://dadosabertos.camara.leg.br/arquivos/proposicoes/json/proposicoes-2018.json");   
                $json_str = json_decode($json_file, true);
                $itens = $json_str['dados'];

                foreach ( $itens as $e ) 
                {          
                    $idProposicao  = $e['id'];
                    $idTipoProposicao = $e['idTipo'];
                    $descricaoTipoProposicao= $e['descricaoTipo'];
                    $ano =$e['ano'];
                    $idOrgaoNumerador =substr($e['uriOrgaoNumerador'], 49);
                    $ementa  = $e['ementa'];
                    $ultimoStatus = $e['ultimoStatus'];
                    $ultimoStatus_codOrgao = $ultimoStatus['codOrgao'];
                    $ultimoStatus_dataHora = $ultimoStatus['data'];
                    $ultimoStatus_idRelator = substr($ultimoStatus['uriRelator'], 52);
                    $ultimoStatus_descricaoSituacao = $ultimoStatus['descricaoSituacao'];
            
                    $query = "INSERT INTO proposicoes
                                (idProposicao, idTipoProposicao, descricaoTipoProposicao, ano, idOrgaoNumerador, ementa, ultimoStatus_codOrgao, ultimoStatus_dataHora, ultimoStatus_idRelator, ultimoStatus_descricaoSituacao)
                                VALUES
                                (:idProposicao, :idTipoProposicao, :descricaoTipoProposicao ,:ano, :idOrgaoNumerador, :ementa, :ultimoStatus_codOrgao, :ultimoStatus_dataHora, :ultimoStatus_idRelator, :ultimoStatus_descricaoSituacao)";
                    
                    $statement = $db->prepare($query);
                    $statement->bindValue(':idProposicao', $idProposicao);
                    $statement->bindValue(':idTipoProposicao', $idTipoProposicao);
                    $statement->bindValue(':descricaoTipoProposicao', $descricaoTipoProposicao);
                    $statement->bindValue(':ano', $ano);
                    $statement->bindValue(':idOrgaoNumerador', $idOrgaoNumerador);
                    $statement->bindValue(':ementa', $ementa);
                    $statement->bindValue(':ultimoStatus_codOrgao', $ultimoStatus_codOrgao);
                    $statement->bindValue(':ultimoStatus_dataHora', $ultimoStatus_dataHora);
                    $statement->bindValue(':ultimoStatus_idRelator', $ultimoStatus_idRelator);
                    $statement->bindValue(':ultimoStatus_descricaoSituacao', $ultimoStatus_descricaoSituacao);
                    
                    $statement->execute();
                    $statement->closeCursor();
                } 
            }
        }
    ?>    
    </body>
</html>


