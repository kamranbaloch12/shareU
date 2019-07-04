<?php
       session_start();
       $db = mysqli_connect('localhost','root','','chat');


       if(isset($_SESSION['mail'])){

       }
       else{
         header('location:index.php');
       }


        $emaill = $_SESSION['mail'];
            $_SESSION['maill'] = $emaill;

            
          
            
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ShareU</title>
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
                       <input name="searchh" placeholder="search any user.." class="form-control" type="search">
                       <button name="button"  class="btn btn-primary ml-1 mt-1"><b>Search</b></button>
                    </div>
                    
                    


                </form>
               
 
            </ul>
         </div>
         </div>
         <br><br>
         
         <?php
            
            
            $sqll =  "SELECT * FROM post ";
            $ww =  mysqli_query($db,$sqll);
            if($ww){
              $fff =  mysqli_fetch_array($ww);
              $post_id =  $fff['id'];
              
            }



               $sqll =  "SELECT * FROM user WHERE email='$emaill'";
                $ww =  mysqli_query($db,$sqll);
                if($ww){
                  $ff =  mysqli_fetch_array($ww);
                  $idd =  $ff['id'];
                   $_SESSION['idd'] = $idd;
                  
                }
                  


           if(isset($_REQUEST['post'])){
                 $content = $_REQUEST['content'];
                 $post_img = $_FILES['post_img']['name'];
                 $tmp = $_FILES['post_img']['tmp_name'];
                 
                 move_uploaded_file($tmp,"uer_img/$post_img");
                   $sql = "INSERT INTO post(user_id,post_content,date,upload_img) VALUES('$idd','$content',NOW(),'$post_img')";
                    $qr =  mysqli_query($db,$sql);
                    if($qr){
                         echo "<script type='text/javascript'>  alert('post is been published') </script> ";
                  // echo "<script type='text/javascript'>  window.open('home.php') </script> ";
                            
                    }
                    else{
                      echo "<script type='text/javascript'>  alert('Failed please try again....!') </script> ";
                    }
                    
           } 
         
         
         ?>

        

              <div class="container">

                     <div class="row ml-auto">
                     <center>
                      
                     <div   class="col-md-6 ml-3 mal-auto">
                           
                           <form class="mx-auto" method="post" enctype="multipart/form-data" action="">
                               <div class="form-group">
                                     <textarea Required  name='content' placeholder="share something...." name="" id="" cols="50" rows="5"></textarea>
                                        <input Required  name="post_img" size="20px" type="file"><br>
                                        <button name="post" class="btn btn-success mt-1">post</button>
                               </div>
                             
 
                           </form>

                        

                        </div>
                     </center>
                         <!--col 1 finish-->
                      
                      
                  

                        </div>
                        <center> <h2 class="mr-5 pr-5" ><b>News Feed</b></h3><hr></center>
                      <!--row 1 finish-->
                  
               



               <?php
               
                  $data = "SELECT * FROM post  ORDER BY id DESC ";
                   $query =  mysqli_query($db,$data);

                  
                      while( $fetch = mysqli_fetch_array($query)){
                          $user_id = $fetch['user_id'];
                          $datee = $fetch['date'];
                          $post  = $fetch['post_content'];
                          $post_image = $fetch['upload_img'];
                        
                      
                      
                   
                         
                         
                            $user =  "SELECT * FROM user WHERE id = '$user_id' ";
                            $res =  mysqli_query($db,$user);
                            if($res){
                              $dd = mysqli_fetch_array($res);
                              $user_name = $dd['name'];
                              $id = $dd['id'];
                             $profile_img = $dd['profile_img'];
           
                             }
                            
           
                             
                          
                          ?>
                          
                        
                      
                     
               
                      <div class="row">
                     

                          <div class="col-md-4  mx-auto" >
                            <div class="row">

                               <div class="col-sm-2 title" >
                                    <img class="rounded-circle" height="65px" width="65px" src="<?php echo'uer_img/'. $profile_img; ?>"alt="">
                                </div>

                            <div class="col-md-6 ml-3 mt-2">
                               <b><?php echo $user_name; ?></b><br>
                              <?php echo $datee; ?><br>
                               <b><?php echo $post; ?><br></b>

                            </div>
                            
                            </div>
                          
                          
                          </div>
                      
                      
                      </div>
       

       <div class="row mt-2 mb-4">
          <div class="col-md-6 mx-auto">
             <img width="80%"  src=" <?php echo 'uer_img/'. $post_image; ?>" alt="">
              
         




              
               
          </div>
       
       </div>
      
 
               
                      
       <?php } ;?>  
      
                  
              </div>
           
               <!--container finish-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>






