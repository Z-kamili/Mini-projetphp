  function validation(){
                    var nom = document.getElementById("boitname").value;
                    var email = document.getElementById("boiteml").value;
                    var msg= document.getElementById("boitmsg").value;
                    if(validname(nom) && validEmail(email) && validMesage(msg)){

                      alert('La forme bien valide');

                    }else{
                      if(!validname(nom)){
                        alert('Le nom nest pas valide');
                      }else if(!validEmail(email)){
                        alert('email nest pas valide');
                      }else if(!validMesage(msg)){
                        alert('le message  nest pas valide');
                      }
                   
                   

                   }
                  }
 
              function validname(nom){
                var letters =/^[A-Za-z]+$/;
                

                if(letters.test(nom)==true){
                       return true;
                   }
               else{
                    return false;  
                   }
                } 
                
                function validEmail(email){
                   
                  var exp =  new RegExp(/^[A-Za-z-0-9-_.]+@[A-Za-z]{4,7}.[A-Za-z]{2,3}$/);
                  var valid = exp.test(email);
                    
                    if(valid){
                      
                        return true;
                        
                      }
                   else{
                    console.log("message");
                      return false;
                   }
                    
                  }
                function validMesage(msg){
                 
                  if(msg.length<=250){
                         return true;
                   }
                   else{
                      return false;
                   }
             }
