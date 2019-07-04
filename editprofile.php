<!doctype html>
<?php
       session_start();
       $db = mysqli_connect('localhost','root','','chat');
     
       if(isset($_SESSION['maill'])){

      }
      else{
        header('location:login.php');
      }
          

              
             
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <style>
    
.edit{
   background-color: silver;
   height:800px;
}
  
  </style>
  <body >
  <table class="table table-bordered table-dark">
     
     <?php
     try{
      $us = $_SESSION['editt'];
     }catch(EXCEPTION $e){
         echo "HSBDHD ";
     }
          
               
            $sql =  "SELECT * FROM user WHERE email = '$us'  ";
            $q = mysqli_query($db,$sql);
             $fetch = mysqli_fetch_array($q);

              $name = $fetch['name'];
              $email = $fetch['email'];
              $password = $fetch['password'];
              $status = $fetch['status'];
              $age = $fetch['birthdate'];
              $country = $fetch['country'];
              $reltaion = $fetch['relationship'];
            
     
     
     
     ?>


  <?php

       if(isset($_REQUEST['update'])){

          $namee = $_REQUEST['name'];
          $emaill = $_REQUEST['email'];
          $pass = $_REQUEST['password'];
          $agee = $_REQUEST['age'];
          $relationn = $_REQUEST['relation'];
          $statuss = $_REQUEST['status'];
          $country = $_REQUEST['country'];
           
         $data =  "UPDATE user SET name='$namee' ,  email='$emaill' , password='$pass' , birthdate='$agee' , relationship='$relationn' , status='$statuss',country='$country' WHERE email='$us'  ";
             $query =  mysqli_query($db,$data);
             if($query){
               
                 echo "<script type='text/javascript'> alert('Your information is been updated... ') </script> ";
                
                  header('login.php');

               // echo  "<center><h3> Please go and do again login to make your update work...</h1> </center>";
                 

             }
             else{
                echo "<script type='text/javascript'> alert('Failed please try again ...! ') </script> ";
             }
        
        }
  
  
  
  ?>


   <div class="container edit">
         <div class="row">

             <div class="col-md-6 mx-auto">
                     <center><b><h3>Edit your Profile</h4></b></center><hr>
                    <form method="POST" action="">
                    
                       <div class="form-group">
                        <label for=""><b>Name</b></label>
                        <input Required name="name" placeholder="<?php echo $name; ?>" class="form-control" type="text">
                       </div>
                       

                       <div class="form-group">
                        <label for=""><b>Email</b></label>
                        <input Required name="email" placeholder="<?php echo $email; ?>"  class="form-control" type="email">
                       </div>

                       <div class="form-group">
                        <label for=""><b>Password</b></label>
                        <input Required name="password" placeholder="<?php echo $password; ?>"  class="form-control" type="password">
                       </div>
                    
                       <div class="form-group">
                        <label for=""><b>Age</b></label>
                        <input Required name="age" placeholder="<?php echo $age; ?>"  class="form-control" type="date">
                       </div>

                       <div class="form-group">
                        <label for=""><b>Country</b></label>
                        <input Required name="country" placeholder="<?php echo $country; ?>"  class="form-control" type="text">
                       </div>
                    
                       <div class="form-group">
                        <label for=""><b>Relationship Status</b></label><br>
                        <select Required name="relation" id="">
                          <option value="single"><b>Single</b></option>
                          <option value="married"><b>Married</b></option>
                          <option value="divorced"><b>Divorced</b></option>
                          <option value="engaged"><b>Engaged</b></option>
                        </select>
                       </div>

                       <div class="form-group">
                        <label  for=""><b>Status</b></label>
                        <input Required name="status" placeholder="<?php echo $status; ?>"  class="form-control" type="text">
                       </div>
                       <button name="update" class="btn btn-primary">Update</button>
                    </form>


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