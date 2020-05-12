<?php
       require 'database.php';
       $nameError = $prenomError = $pointError = $name = $prenom = $point = "";
       $isSuccess = true;
  if(!empty($_GET['id'])){
      
      
    $id = checkInput($_GET['id']);
         
    $db = Database::connect();
    
    $statement = $db->prepare("select * from liste_apprenant where ID = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name = $item['nom'];
    $prenom = $item['prenom'];
    $point = $item['point'];
            
    Database::disconnect();
      
  }
      

     if(!empty($_POST))
     {
    
         $name = checkInput($_POST['name']);
         $prenom = checkInput($_POST['Prenom']);
         $point = checkInput($_POST['point']);
         
       
         
         
         if(empty($name)){
             
             
             $nameError = "ce champ ne peut pas etre vide";
             $isSuccess = false;
             
         }
          if(empty($prenom)){
             
             
            $prenomError = "ce champ ne peut pas etre vide"
;
             $isSuccess = false;
             
         }
         
         
       
             
             if($isSuccess){  
             $db = Database::connect(); 
             $statement = $db->prepare("Update liste_apprenant set nom = ?,prenom = ?,point = ? where  ID = ?");
             $statement->execute(array($name,$prenom,$point,$id)); 
             Database::disconnect();
             header("Location: admin.php");
             }
             
             
            
            
             
             
             
             
         }
         
         
         
         
         
         
         
         
         
         
    
    
    
else{
    
 
            
    
    
    
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
<title>Gestion des apprenant</title>
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
            <h1><strong>Modifier  un  item</strong></h1>
                <br>
            <form class="form" action="<?php echo 'update.php?id=' .$id; ?>" method="post">
            <div class="form-group" enctype="multipart/form-data">
                <labe for="name">Nom: </labe>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $name; ?>">
                <span class="help-inline"> 
                <?php echo $nameError; ?>
                </span>
                
                </div>   
                 <div class="form-group">
                <labe for="description">Prenom: </labe>
                <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom" value="<?php echo $prenom; ?>">
                <span class="help-inline"> 
                <?php echo $prenomError; ?>
                </span>
                </div>   
                 <div class="form-group">
                <labe for="price">Point: </labe>
                <input type="number" step="0" class="form-control" id="point" name="point" placeholder="point" value="<?php echo $point; ?>">
                <span class="help-inline"> 
                <?php echo $pointError; ?>
                </span>
                
                </div>     
                
           
            <br>
            
            <div class="form-actions">
            
            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-pencil"></span>Modifier   </button>
   <a class="btn btn-primary" href="admin.php"> <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>            
            </div>
                 </form>
               
            
            
            
            </div>
       
            
           
            
        </div>
        
        
        </div>
    
    
    
    </body>
</html>