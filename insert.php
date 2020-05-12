<?php
       require 'database.php';
  
      $nameError = $PrenomError = $Errorpoint = $point = $Prenom = $name = $isSuccess =  "";

     if(!empty($_POST))
     {
    
         $name = checkInput($_POST['name']);
         $Prenom = checkInput($_POST['Prenom']);
         $point = checkInput($_POST['point']);
         $isSuccess = true;
         
         
         if(empty($name)){
             
             
             $nameError = "ce champ ne peut pas etre vide";
             $isSuccess = false;
             
         }
          if(empty($Prenom)){
             
             
             $PrenomError = "ce champ ne peut pas etre vide";
             $isSuccess = false;
             
         }
          if($point == ""){
             
             
             $Errorpoint = "ce champ ne peut pas etre vide";
             $isSuccess = false;
             
         }
           if($isSuccess){
                $db = Database::connect();
                $statement = $db->prepare("Insert into liste_apprenant (Nom,Prenom,point) value(?,?,?)");
                $statement->execute(array($name,$Prenom,$point));
                Database::disconnect();
                header("Location: admin.php");  
            }
            
            
             
             
             
             
         }      

function checkInput($data){
    
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
    
}



?>

<!DOCTYPE html>
<html>
<head>
<title>Burger code</title>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type="text/css">
</head>
    <body>
   
        <div class="container admin">
        
        <div class="row">
          
                
                <br>
            <form class="form" action="insert.php" method="post">
            <h1><strong>Ajouter  un  apprenant</strong></h1>
            <div class="form-group" enctype="multipart/form-data">
                <labe for="name">Nom: </labe>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $name; ?>">
                <span class="help-inline"> 
                <?php echo $nameError; ?>
                </span>
                
                </div>   
                 <div class="form-group">
                <labe for="description">Prenom </labe>
                <input type="text" class="form-control" id="description" name="Prenom" placeholder="description" value="<?php echo $Prenom; ?>">
                <span class="help-inline"> 
                <?php echo $PrenomError; ?>
                </span>
                
                </div>   
                 <div class="form-group">
                <labe for="price">Point: </labe>
                <input type="number" step="0" class="form-control" id="point" name="point" placeholder="point" value="<?php echo $point; ?>">
                <span class="help-inline"> 
                <?php echo $Errorpoint; ?>
                </span>
                
                </div>   
                
                 
                
           
            <br>
            
            <div class="form-actions">
            
            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-pencil"></span>Ajouter   </button>
   <a class="btn btn-primary" href="admin.php"> <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>            
            </div>
                 </form>
               
            
            
            
       
            
           
            
        </div>
        
        
        </div>
    
    
    
    </body>
</html>