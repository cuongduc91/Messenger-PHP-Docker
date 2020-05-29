<?php
session_start();
include("include/connection.php");
include("include/header.php");
if(!isset($_SESSION['user_email'])){
	
	header("location: signin.php");

}
else{ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/find_people.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <title>Search friends</title>
</head>
<body>
  <div class="row">
    <div class="col-sm-2"> 

    </div>
    <?php 
      $user = $_SESSION['user_email'];
      $get_user = "select * from users where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);

      $user_name = $row['user_name'];
      $user_pass = $row['user_pass'];
      $user_email = $row['user_email'];
      $user_profile = $row['user_profile'];
      $user_country = $row['user_country'];
      $user_gender = $row['user_gender'];
    ?>

    <div class="col-sm-8">
      <form action="" method="post" enctype="multipart/form-data ">
      <table class="table table-bordered table-hover">
        <tr align="center">
          <td class="active" colspan="6">
            <h2>Change Account Setting</h2>
          </td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Change Your Username</td>
            <td>
              <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
             </td>
          </tr>
          <tr>
            <td>
              
            </td>
            <td>
              <a href="upload.php" class="btn btn-default" style="text-decoration: none;font-size: 15px;" >
              <i class="fa fa-user" aira-hidden="true">Change Profile</i></a>
            </td>
          </tr>
          <tr>
            <td style="font-weight: bold;">Email</td>
            <td>
              <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_email;?>">
            </td>
          </tr>
          <tr>
              <td style="font-weight: bold;">Country</td>
              <td>
                <select class="form-control" name="u_country">
                  <option><?php echo $user_country;?></option>
                  <option>Germany</option>  
                  <option>United States of America</option>
                  <option>Norway</option>
                  <option>UK</option>
                  <option>France</option>
                </select>
              </td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Gender</td>
              <td>
                <select class="form-control" name="u_gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bold;">
                Forgot your password?
              </td>
              <td>
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">Forgot password</button>
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal"class="close">
                          &times;
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                          <strong>What is your first elementary school?</strong>
                          <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Your School Name"></textarea><br/>
                          <input class="btn btn-default" type="submit" name="sub" value="Submit" style="width:100px;" /><br><br>
                          <pre >Answer the above question we will ask you this question if you forgot your <br>password.
                          </pre>
                          <br><br>
                        </form>
                        <?php
                          if(isset($_POST['sub'])){
                            $bfn = htmlentities($_POST['content']);

                            if($bfn==''){
                              echo "<script>alert('Please Enter Something!')</script>";
                              echo "<script>window.open('account_settings.php','_self')</script>";                          
                              exit();                          
                            }
                            else {
                              $update = "update users set forgotten_answer='$bfn' where user_email='$user'";                  
                              $run = mysqli_query($con,$update);
                          
                            if($run){
                            
                              echo "<script>alert('Working...!')</script>";
                              echo "<script>window.open('account_settings.php?','_self')</script>";
                            }else{
                              echo "<script>alert('Error while Updating information...!')</script>";
                              echo "<script>window.open('account_settings.php','_self')</script>";
                            }
                          }
                        }
                        ?>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                  <a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a>
              </td>
            </tr>
            <tr align="center">
              <td colspan="6">
              <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Update"/>
              </td>
            </tr>

      </table>
    </form>
    <?php

          if(isset($_POST['update'])){
          
          $user_name = htmlentities($_POST['u_name']);
          $email = htmlentities($_POST['u_email']);
          $u_country = htmlentities($_POST['u_country']);
          $u_gender = htmlentities($_POST['u_gender']);
          
          
          $update = "update users set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";
          
          $run = mysqli_query($con,$update); 
          
          if($run){
              echo "<script>window.open('account_settings.php','_self')</script>";
          }
        }

        ?>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</body>
</html>
<script>
function show_password() {
    var x = document.getElementById("mypass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<?php } ?>