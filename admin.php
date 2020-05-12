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
     <div class="head"><img src="img/logo.png" class="lg" width="200px" height="50px"> <a class="btn btn-primary btn2" href="login.php"> Déconnexion </a> </div> 
      
        
    </header>
    <div class="container admin">
        
        <div class="row">
            
        <h1><strong>Liste des Apprenant</strong>
            <a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
            <table class="table table-striped table-bordered">
            
            <thead>
                <tr>
                <th>Classement</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Point</th>
                <th>Actions</th>
                </tr>
                
                
                
            </thead>
            
            <tbody>
                
                
                <?php 
                require 'database.php';
                
                $db = Database::connect();
                
                $statement = $db->query("select * from liste_apprenant order by point desc");
                $cpt = 1;
                
                while($item = $statement->fetch())
                {
                    
                    
               echo      '<tr>';
               echo    '<td>' . $cpt .  '</td>';
               echo    '<td>' . $item['nom'] .  '</td>';
               echo    '<td>' . $item['prenom'] .  '</td>';
               echo    '<td>' . $item['point'] .  '</td>'; 
               echo   '<td width=300>';
               echo     '<a class="btn btn-default" href="view.php?id=' . $item['ID'] . '"><span class="glyphicon glyphicon-eye-open"></span> Voir </a>';
               echo ' ';
               echo   '<a class="btn btn-primary" href="update.php?id=' .$item['ID']. '"><span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
               echo ' ';
               echo     '<a class="btn btn-danger" href="delete.php?id=' .$item['ID']. '"><span class="glyphicon glyphicon-remove"></span> delete </a>'; 
               echo    '</td>';
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
            </body>
            </html>