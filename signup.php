<!doctype html>
  <?php
             $db = mysqli_connect("localhost","root","","chat");
            
  
  ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <title>Signup/ShareU</title>
    <style>
    .signup{
         height:1000px;
    }
    </style>
  </head>
  <body style="background-color:teal; ">
 
  <?php
            if(isset($_REQUEST['signup'])){
               $name = $_REQUEST['name'];
               $email = $_REQUEST['email'];
               $password = $_REQUEST['password'];
               $password2 = $_REQUEST['password2'];
               $contry = $_REQUEST['country'];
                 //$gender = $_REQUEST['gender'];
               $age = $_REQUEST['birth'];

               $profile = $_FILES['pro']['name'];
               $tmp = $_FILES['pro']['tmp_name'];
 
               if(strlen($password)<5){
                    echo "<script type='text/javascript'>alert('Password length should be greater than 5.....!') </script>";
               }
          else{
               if($password==$password2){
                    move_uploaded_file($tmp,"uer_img/$profile");
                       $sql =  "INSERT INTO user(name,email,password,date,country,birthdate,status,profile_img) VALUES('$name','$email','$password',NOW(),'$contry','$age','This is deafult status from kamran baloch','$profile')";  
                            $res =  mysqli_query($db,$sql);
                            if($res){
                             
                              echo "<script type='text/javascript'>alert('  you have been successfully registerd please go and do login') </script>";
                            }
                            else{
                              echo "<script type='text/javascript'>alert('failed....!') </script>";
                            }

               } 
               else{
                    echo "<script type='text/javascript'>alert('Password and confirm password are not matched.....!') </script>";

               }
             }
               
            }
         
         
         
         
         ?>
        
        













         <div class="container">
               <div class="row">

                  <div class="col-md-6 mx-auto signup">
                    <div class="text-center stext" >
                          <h3><b>Signup</b></h3>
                          <b>Make an account to join our comunity...</b>

                    </div><hr> <br>
                   

                   <form enctype="multipart/form-data"  method="POST" action=""> 
                        <div class="form-group">
                               
                                <label for=""><b><h5>Name</h4></b></label>
                                 <input required placeholder="Name" class="form-control" type="text" name="name" id="">
      
     
                            </div>


                       <div class="form-group">
                           <label for=""><b><h5>Email</h4></b></label>
                            <input required placeholder="Email" class="form-control" type="email" name="email" id="">
 

                       </div>
                     
                       <div class="form-group">
                            <label for=""><b><h5>Password</h4></b></label>
                             <input required placeholder="Password" class="form-control" type="password" name="password" id="">
  
 
                        </div>
                        <div class="form-group">
                            <label for=""><b><h5>Confirm-password</h4></b></label>
                             <input required placeholder="confrim-password" class="form-control" type="password" name="password2" id="">
  
 
                        </div>
                       
                        <div class="form-group">
                                <label for=""><b><h5>Country</h4></b></label>
                                 <input required placeholder="Balochitsan" class="form-control" type="text" name="country" id="">
      
     
                            </div>
                            <div class="form-group">
                                <label for=""><b><h5>Age</h4></b></label>
                                 <input required placeholder="birth date" class="form-control" type="date" name="birth" id="">
      
     
                            </div>

                            <div class="form-group">
                                    
                                    <b>Male</b> <input  name="gender" type="checkbox">
                                    <b>Female</b> <input  name="gender" type="checkbox">
          
                                </div>
                                <div class="form-group">
                                <label for=""><b><h5>Profile</h4></b></label>
                                 <input class="form-control p-1" required   type="file" name="pro" id="">
      
     
                            </div>
                          

                             <button name="signup" class="btn btn-primary"><b>Done</b></button><b>or</b>
                             <a  class="btn btn-danger" href="login.php"><b>Login</b></a>

                   </form>
                      <br>

                  <input type="checkbox">
                  <b>I accecpt the <span class="text-info">Terms</span> of use and <span  class="text-info">Privicy policy</span>..</b>

                  </div>


               </div>


         </div>

        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>