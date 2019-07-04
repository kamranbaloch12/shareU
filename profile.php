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

   <?PHP
   $user_email =  $_SESSION['maill'];
    $u =  "SELECT * FROM user WHERE email ='$user_email' ";
      $uq = mysqli_query($db,$u);
        if($uq){
         $uf = mysqli_fetch_array($uq);
         $user = $uf['name'];

        }
    
    
    
    ?>


    <title><?php echo $user; ?> </title>
  </head>
  <body>
  <div style="background-color:silver " class="navbar navbar-expand-sm navbar-dark ">
            <a class="navbar-brand" href=""><b>ShareU</b></a>
            <button data-target="#data" data-toggle="collapse" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
    

            </button>
            <div id="data" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                
                <li class="navbar-item"><a class="nav-link text-dark" href="home.php"><b>Home</b></a></li>
                <li class="navbar-item"><a class="nav-link text-dark" href="find.php"><b>Find people</b></a></li>
                
                <li class="navbar-item"><a class="nav-link text-white btn btn-danger " href="profile.php"><b>Your profile</b></a> </li>
                <form class="ml-5" action="" >
                    <div class="form-inline">
                       <input placeholder="search any user.." class="form-control" type="search">
                       <button  class="btn btn-primary ml-1 mt-1"><b>Search</b></button>
                    </div>

                </form>
               

            </ul>
         </div>
         </div>
<br><br>

<?php

       $user_email =  $_SESSION['maill'];
         $_SESSION['editt'] = $user_email;
       

     if(isset($_REQUEST['cover'])){
        
       
       $img = $_FILES['img'];
         $img_name = $_FILES['img']['name'];
         $tmp_name = $_FILES['img']['tmp_name'];
       $rand = rand(1,100);


        
              move_uploaded_file($tmp_name,"uer_img/$img_name.$rand");
             $data =   " UPDATE user SET cover_img='$img_name.$rand' WHERE email='$user_email' "; 
            $query =  mysqli_query($db,$data);
             if($query){ 
             echo "<script type='text/javascript'> alert('done') </script>";

             }
            else{
              echo "<script type='text/javascript'> alert('failed...!') </script>";
            }
              


        }
     




?>


     <div class="conatiner">
            <div class="row">
              <?php
                   $sql= "SELECT * FROM user WHERE email = '$user_email' ";
                      $qr =  mysqli_query($db,$sql);

                    if($qr){
                      $fetch =  mysqli_fetch_array($qr);
                      $cover_img = $fetch['cover_img'];
                      $iddd = $fetch['id'];
                    
                    }
                  else{
                    echo "failed";
                  }

                     
              
              
              ?>




                <div  class="col-md-8 mx-auto ">
                      <img style="border-radius:10px;" height="350vh" width="100%" src="<?php  echo 'uer_img/'.$cover_img;?>" alt="">  
                </div>
            </div>
         
         <div class="row">
            <div class="col-md-2 mx-auto mt-1">
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    change cover
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#"><form enctype="multipart/form-data" method="POST" action="">
        <input name="img" type="file">
    </a>
    <a class="dropdown-item" href="#"><button name="cover">UPDATE</button> </form></a>
    
  </div>
</div>
            </div>

         </div>

         
<?php
     

     if(isset($_REQUEST['profile'])){
        
       
       $img = $_FILES['img1'];
        $img_name1 = $_FILES['img1']['name'];
       $tmp_name1 = $_FILES['img1']['tmp_name'];
       $rand1 = rand(1,100);


        
              move_uploaded_file($tmp_name1,"uer_img/$img_name1.$rand1");
             $data1 =   " UPDATE user SET profile_img='$img_name1.$rand1' WHERE email='$user_email' "; 
            $query1 =  mysqli_query($db,$data1);
             if($query1){ 
             echo "<script type='text/javascript'> alert('done') </script>";

             }
            else{
              echo "<script type='text/javascript'> alert('failed...!') </script>";
            }
              


        }
     




?>


 <div class="row mt-2">

      <div class="col-md-1 mx-auto">
          
      <?php
                   $sql= "SELECT * FROM user WHERE email = '$user_email' ";
                      $qr =  mysqli_query($db,$sql);

                    if($qr){
                      $fetch =  mysqli_fetch_array($qr);
                      $profile = $fetch['profile_img'];
                      $name = $fetch['name'];
                      $date = $fetch['date'];
                      $age = $fetch['birthdate'];
                      $status = $fetch['status'];
                      $country = $fetch['country'];
                      $gender = $fetch['gender'];
                      $relation = $fetch['relationship'];
                  
            
                    }
                  else{
                    echo "failed";
                  }

                     
              
              
              ?>


           <img class="rounded-circle" height="50%" width="80%" src="<?php echo 'uer_img/'. $profile;  ?>" alt="">
           <div class="dropdown">
  <button class="btn btn-secondary mt-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    change profile
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton ">
    <a class="dropdown-item" href="#"><form enctype="multipart/form-data" method="POST" action="">
        <input name="img1" type="file">
    </a>
    <a class="dropdown-item" href="#"><button name="profile">UPDATE</button> </form></a>
   
    
  </div>

</div>


      

</div>

            
                   
  
   

  </div> 
  <div class="row ml-5" >
               

                  <div style=" background-color: silver;padding:10px; border-radius:5px;height:400px;"  class="col-md-2  about ">
                    <h4><b>About</b></h5><hr>
                     <h6><b></b> <?php echo $name;  ?></h4>
                     <h6><b>  Status :  </b> <?php echo $status;  ?></h4>
                     <h6><b>Age :</b> <?php echo $age;  ?></h4>
                     <h6><b>Join date :  </b> <?php echo $date;  ?></h4>
                     <h6><b>Lives in : </b> <?php echo $country;  ?></h4>
                    
                     <h6><b>Relationship : </b> <?php echo $relation;  ?></h4>

                     <form method="post" action="">
                        <button name="logout" class="btn btn-danger">Logout</button>
                        <a  class="btn btn-success mt-1" href="editprofile.php">Edit</a>
                     </form>
                          
                          <?php
                               if(isset($_REQUEST['logout'])){
                                 session_destroy();
                                 echo "<script type='text/javascript'>window.open('login.php') </script> ";
                               }
                          ?>

          <?php
                 $post = "SELECT * FROM post ";
                  $pq = mysqli_query($db,$post);
                   $pf = mysqli_fetch_array($pq);
                     $post_id = $pf['id'];
          
          
          ?>
                  
               
       </div>
  
              <?php 
                    
                  //$user_id =  $_SESSION['user_id'];
                    
                  $res =  "SELECT * FROM post WHERE user_id='$iddd' ORDER BY id DESC ";
                  $queryy = mysqli_query($db,$res);
                    while ($ff =  mysqli_fetch_array($queryy)){

                    $content =   $ff['post_content'];
                    $upload_img =   $ff['upload_img'];
                    $date =   $ff['date'];
                    $user_idd =   $ff['user_id'];
                   


                   $qrr =  "SELECT * FROM user WHERE id ='$user_idd' "; 
                      $n = mysqli_query($db,$qrr);
                       $row =  mysqli_fetch_array($n);
                        $profile_img =   $row['profile_img']; 
                        $namee =   $row['name']; 

                      if(isset($_REQUEST['delete'])){

                        $delete = "DELETE FROM post WHERE id ='$post_id' ";
                          $del = mysqli_query($db,$delete);
                            if($del){
                            echo "<script type='text/javascript'> alert('post is been deleted.....')</script> ";
                            echo "<script type='text/javascript'> window.open('profile.php')</script> ";
                            }
                            else{
                              echo "<script type='text/javascript'> alert('Please try again .....')</script> ";
                            }
                      }
                    
              
              ?>


                <div  class="col-md-10 ml-auto ">

                     <div class="row mt-2">

                     <div class="col-sm-1 " >
                        <img class="rounded-circle" height="65px" width="65px" src="<?php echo 'uer_img/'. $profile_img; ?>"alt="">
                       </div>
                      
                   
                          <div class="col-md-2 mr-5 mt-2">
                               <b>  <?php echo $namee; ?></b><br>
                              <?php echo $date; ?><br>
                               <b><?php echo $content; ?><br></b>

                            </div>

                     </div>

                     <div class="row mt-2">
                      <div class="col-md-6">
                      <a href="<?php  echo 'uer_img/'. $upload_img; ?>"> <img width="100%" src="<?php  echo 'uer_img/'. $upload_img; ?>" alt=""></a>
                        <form method="post" action="">
                        <button name="delete" class="btn btn-danger mt-1">Delete</button>
                       
                       
                        </form>

                      
                      </div>
                     
                     </div>

 
                
                     
                </div>
                
                <?php }; ?>

                    <!--main col of user pics -->
              

                
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
