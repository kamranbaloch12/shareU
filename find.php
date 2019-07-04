<!doctype html>
<?php
       session_start();
       $db = mysqli_connect('localhost','root','','chat');
       if(isset($_SESSION['mail'])){

      }
      else{
        header('location:login.php');
      }

     $user_id = $_SESSION['idd'];
     $_SESSION['user_idd'] = $user_id
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>findPeople</title>
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
         </div><br><br>
               <center> <h3><b>Find people</b></h3></center><br><br>
             <div class="container ">
                <div class="row">
                   <div class="col-md-6 mx-auto"  >
                        <form method='post' action="">  
                         <div class="form-inline">
                         <input id="search"  name="search" class="form-control" placeholder="Search any user.." type="search">
                          <button type='submit' name="button" class="btn btn-success ml-1 mt-1 mb-2">Search</button>
                          
                         </div>
                        
                        </form>
                   </div>
                </div><br><br>

                <?php
                     if(isset($_REQUEST['button'])){
                    
                        $search = $_REQUEST['search'];
                         
                         $sql = "SELECT * FROM  user WHERE name LIKE ' %$search% ' ORDER BY id DESC ";
                           } 
                      else{
                        $sql = "SELECT * FROM  user ORDER BY id DESC  ";
                          $qr = mysqli_query($db,$sql);
                            while($fetch = mysqli_fetch_array($qr)){
                                 $name = $fetch['name'];
                                 $id = $fetch['id'];
                                 
                                 $profile = $fetch['profile_img'];
                                
                ?>

                
                         <div class='row'>
                                       <div class='col-md-6 mx-auto user'>
                                            <div class='row mb-2' >
                                                <div class='col-md-4 ml-5'>
                                                 <a href=' userprofile.php.<?php echo "?id=$id" ; ?>'> 
                                                     <img titile='$name' height='140px'  width='150px' src="<?php echo 'uer_img/' .$profile; ?>" > 
                                                     
                                                    
                                                 </a>
                                                
                                                 </div>

                                               <div class='col-md-6 ml-2 mt-3'>
                                                  <a href='userprofile.php.<?php echo "?id=$id" ; ?>'>
                                                  <strong> <?php echo $name; ?> </strong><hr>
                                                  </a>
                                               
                                               
                                               </div>
                                            
                                            </div> 

                                       </div>

                                  </div>
                                    
                    <?php  } }; ?>
                                
             
             
             
             </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>