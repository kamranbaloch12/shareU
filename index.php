<!doctype html>
<?php
   session_start();
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

    <title>Login/ShareU</title>
  </head>
  <body style="background-color:teal ">
         <div class="container">
               <div class="row">

                  <div class="col-md-6 mx-auto login">
                    <div class="text-center text" >
                          <h3><b>Login</b></h3>
                          <b>Login to join our comunity...</b>

                    </div><hr> <br>
                   

                   <form method="POST" action=""> 
                       <div class="form-group">
                           <label for=""><b><h5>Email</h4></b></label>
                            <input placeholder="Email" class="form-control" type="email" name="email" id="">
 

                       </div>
                     
                       <div class="form-group">
                            <label for=""><b><h5>Password</h4></b></label>
                             <input placeholder="Password" class="form-control" type="password" name="password" id="">
  
 
                        </div>
                             <button name="login" class="btn btn-primary"><b>Login</b></button><b>or</b>
                             <a  class="btn btn-danger" href="signup.php"><b>register</b></a>

                   </form>
                      



                  </div>


               </div>


         </div>

              <?php
                    if(isset($_REQUEST['login'])){
                      $email = $_REQUEST['email'];
                      $password = $_REQUEST['password'];
                     
                      
                      $sql =  "SELECT * FROM user WHERE email ='$email' AND password='$password' ";
                       $qr =  mysqli_query($db,$sql);
                       
                        $row =  mysqli_num_rows($qr);
                        if($row==1){
                          $_SESSION['mail']=$email;
                          header('location:home.php');
                         
                        }
                        else{
                          echo "<script type='text/javascript'>alert('password or email are not correct...!') </script>";

                          }

                       }
                       

                    
              
              
              ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>