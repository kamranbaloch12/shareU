<!doctype html>
<?php
       session_start();
       $db = mysqli_connect('localhost','root','','chat');
       if(isset($_SESSION['mail'])){

      }
      else{
        header('location:login.php');
      }
       $u_id = $_SESSION['user_idd']; 
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Profile</title>
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
        <?php  
          if(isset($_REQUEST['id'])){
           $id = $_REQUEST['id'];

            //$u_iddd = $_SESSION['user_idd'] ;
             $data  = "SELECT * FROM user   WHERE id='$id' ";
             $qr =  mysqli_query($db,$data);
               $fetch = mysqli_fetch_array($qr);
                 $name = $fetch['name'];
                 $status = $fetch['status'];
                 $gender = $fetch['gender'];
                 $country = $fetch['country'];
                 $profile = $fetch['profile_img'];
                 $age = $fetch['birthdate'];
        
        

          }

        
        ?>


        <div class='container '>
           <div class="row">
                 <div class="col-md-6  userpro  mx-auto">
                  
                  <h3><b>Information About</b></h3>
                  <img class='rounded-circle ml-5' height="20%" width='20%' src="<?php echo'uer_img/'.$profile;?>" alt="">
                   
                   <div class="mt-2">
                                    <ul class="list-group">
                    <li class="list-group-item"> <?php  echo " <b>Name</b> : ". $name; ?></li>
                    <li class="list-group-item"><?php echo " <b>Status </b> : ". $status; ?></li>
                    <li class="list-group-item"><?php echo " <b>country</b> : ". $country; ?></li>
                    <li class="list-group-item"><?php echo "<b>Gender</b> : ". $gender; ?></li>
                    <li class="list-group-item"><?php echo "<b>Age</B> : ". $age; ?></li>
                    </ul>
                                    
                   
                   </div>
                 
                 
                 </div>
                
            <?php
              if(isset($_REQUEST['id'])){
                   $idd = $_REQUEST['id'];

                  $res = "SELECT * FROM post WHERE user_id='$idd'";
                     $query= mysqli_query($db,$res);
                                         
                     while( $row =mysqli_fetch_array($query)){
                           $img = $row['upload_img'];
                           $content = $row['post_content'];
                           $date = $row['date'];
                      
              
            
            
            
            ?>


           
         <div class="col-md-6 ml-auto mt-5">
           
              <div class="row">
                 <div class="col-md-2 mt-1">
                  <img class="rounded-circle"  width="60%" src="<?php echo  'uer_img/'.$profile;?>" alt="">
                 
                 </div>

                 <div class="col-md-4 mr-5">
                   <b> <?php echo $name;?> </b><br>
                     <?php echo $date;?> <br>

                     <b> <?php echo $content;?> </b>
                 </div>
              
              </div>
           <div class="row">
              <div class="col-md-10">
              <img   width="100%" src=" <?php echo  'uer_img/'.$img;?> " alt="">
              
              </div>
           
           </div>

         
         </div>

            <?php }};?>
           </div>
        
        
        
        
        </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>