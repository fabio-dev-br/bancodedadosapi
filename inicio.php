
            
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
      
        $deputados = deputados::getDeputados();
    
  
    ?>    
    </body>
</html>