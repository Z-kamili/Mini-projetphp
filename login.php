<?php
require 'database.php';
$erreur =$email = $mtp = "";
$_SESSION["user"] = "";
$_SESSION["mtp"] = "";

if(!empty($_POST)){
$email = checkInput($_POST["email"]);
$mtp = checkInput($_POST["mtp"]);
$db = Database::connect();
$stmt = $db->query("SELECT * FROM inscription");
while ($row = $stmt->fetch()){
    if($row['email'] == $email && $row['mtp'] == $mtp){
       $_SESSION["user"] = $row['email'];
       $_SESSION["mtp"] = $row['Cin'];
       header("Location: admin.php");

    }else{
        $erreur = "Erreur form n'est pas valide";
    }
}
}

function checkInput($data){
    
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
    
}
?>
    <?php require 'Header.php';?>
        <div class="connecter">
         <form action="login.php" method="POST" id="frm">
        
        <div>  <img src="img/img5.png" width="60px" height="60" class="avatare"> </div>
            
         <div ><input type="text" id="email" placeholder="Email" class="mail" name="email" value="<?php echo $email; ?>"></div>   
           <div><input type="password" id="Mot_passe" placeholder="Mot de passe" class="pass2" name="mtp" value="<?php echo $mtp; ?>"  ></div>  
            <input type="submit" id="btn" class="In" value="Se connecter">
        
        <div class="erreur"><?php echo $erreur; ?></div>
        
        </form>
        
        </div>
       
     
        </body>
        
    </html>