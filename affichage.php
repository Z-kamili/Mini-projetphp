<html>

            <head>
        
        <meta charset="UTF-8">
                <title>Youcode</title>
                <link href="css/style4.css?<?=filemtime("css/style4.css")?>" rel="stylesheet" type="text/css" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
               

            </head>
        
        
        
    <body>
        
    <header>
     <div class="head"><img src="img/logo.png" class="lg" width="200px" height="50px" > <a class="btn btn-primary btn2" href="login.php"> connexion </a> </div> 
      
        
    </header>
    <div class="container admin generale">
        
        <div class="row">
            
        <h1 id="titre"><strong>Classement  des Apprenants</strong>
            
            
            <table class="table table-striped table-bordered" id="table2">
            
            <thead>
                <tr>
                <th>Classement</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Point</th>
                </tr>
                
                
                
            </thead>
            
            <tbody>
                
                
                <?php 
                require 'database.php';
                
                $db = Database::connect();
                
                $statement = $db->query("select * from liste_apprenant order by point desc LIMIT 10
                ");
                $cpt = 1;
                // print_r($statement);
                while($item = $statement->fetch())
                {
                    
                    
               echo      '<tr>';
               echo    '<td>' . $cpt .  '</td>';
               echo    '<td>' . $item['nom'] .  '</td>';
               echo    '<td>' . $item['prenom'] .  '</td>';
               echo    '<td>' . $item['point'] .  '</td>'; 
               
               echo '</tr>';     
                    $cpt++;
                    
                }
                
              Database::disconnect();  
                
                
                ?>
                
          
                
            </tbody>
            </table>
            
        </div>
        
        
        </div>
        <div class="generale"></div>
       <?php require 'footer.php'?>
            </body>
            </html>