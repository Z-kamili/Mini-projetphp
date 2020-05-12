<?php
require 'database.php';
$id = "";
if(!empty($_GET['id'])){
    
    
  $id = checkInput($_GET['id']);  
    
}
$db = Database::connect();
$statement = $db->prepare('select * from liste_apprenant where ID = ?');
$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();
function CheckInput($data){
    $data = trim($data);
    $data =  stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Gestion Des Apprenant</title>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type="text/css">
</head>
    <body>
        <div class="container admin">
        
        <div class="row">
            <div class="col-sm-6">
                 <h1><strong>Voir un  Apprenant</strong></h1>
                <br>
            <form>
                
            <div class="form-group">
                <labe>Nom: </labe><?php echo '  '.$item['nom']; ?>
                
                </div>   
                 <div class="form-group">
                <labe>Prenom:</labe><?php echo '  '.$item['prenom']; ?>
                
                </div>   
                 <div class="form-group">
                <labe>Point: </labe><?php echo '  '.$item['point']; ?>
                
                </div>   
                
            </form>
                <div class="form-group">
                <a class="btn btn-primary" href="admin.php">
                    
                    <span class="glyphicon glyphicon-arrow-left"></span>Retour
                    
                    </a>
                
                </div>
            </div>
            
            
       
            
           
            
        </div>
        
        
        </div>
    
    
    
    </body>
</html>