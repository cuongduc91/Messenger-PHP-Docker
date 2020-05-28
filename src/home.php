<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>My Chat - HOME</title>
</head>
<body>
  <div class="container main-section">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
        <div class="input-group searchbox">
          <div class="input-group-btn">
            <center>
              <a href="include/find_friends.php">
              <button class="btn btn-default search-icon" name="search_user" type="submit">Add new  user</button>
              </a>
            </center>
          </div>
        </div>
        <div class="left-chat">
          <ul>
            <?php include("include/get_users_data.php");?>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
        <div class="row">
          <?php
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row = mysqli_fetch_array($run_user);

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
          ?>
          <!-- Getting user data on click -->
          <?php
            if(isset($GET['user_name'])){
              global $con;
              $get_username = $_GET['user_name'];
              $get_user = "select * from users where user_name='$get_username'";
              $run_user = mysqli_query($con,$get_username);
              $row_user = mysqli_fetch_array($run_user);
              $username = $row_user['user_name'];
              $user_profile_image = $row_user['user_profile'];
            }
            $total_messages = "select * from users_chats where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')"; 
            $run_messages = mysqli_query($con,$total_messages); 
						$total = mysqli_num_rows($run_messages);
          ?>
          <div class="col-md-12 right-header">
            <div class="right-header-img">
              <img src="<?php echo"$user_profile_image" ?> alt="profile picture">
            </div>
            <div class="right-header-detail">
              <form method="post">
								<p><?php echo"$username";?></p>
								<span><?php echo $total; ?> messages</span>&nbsp &nbsp
								<button name="logout" class="btn btn-danger">Logout</button>
              </form>
              <?php
								if(isset($_POST['logout'])){
                  $update_msg = mysqli_query($con,"UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                  header("Location:logout.php");
                  exit();
                }
							?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 right-header-contentChat" id="scrolling_to_bottom">
            <?php
              $update_msg = mysqli_query($con, "UPDATE users_chats SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");

              $sel_msg = "select * from users_chats where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC"; 
              $run_msg = mysqli_query($con,$sel_msg);	
              
              while($row=mysqli_fetch_array($run_msg)){
			
              $sender_username = $row['sender_username'];
              $receiver_username = $row['receiver_username'];
              $msg_content = $row['msg_content'];
              $msg_status = $row['msg_status'];
              $msg_date = $row['msg_date'];

            ?>
              <ul>
              <?php
                if($user_name == $sender_username AND $username == $receiver_username){
                  echo"
                    <li>
                      <div class='rightside-right-chat'>
                        <span> $user_name <small>$msg_date</small> </span><br><br>
                        <p>$msg_content</p>
                      </div>
                    </li>
                  ";
                } else if($user_name == $receiver_username AND  $username == $sender_username){
                  echo"
                    <li>
                      <div class='rightside-left-chat'>
                        <span> $username <small>$msg_date</small> </span><br><br>
                        <p>$msg_content</p>
                      </div>
                    </li>

                  ";
                }
						  ?>
						  </ul>
              <?php
                }
              ?>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 right-chat-textbox">
            <form action="" method="post">
              <input type="text" name="msg_content" autocomplete="off" placeholder="write your message......">
              <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
		if(isset($_POST['submit'])){
			$msg = htmlentities($_POST['msg_content']);
			if($msg == ""){
				echo"
          <div class='alert alert-danger'>
            <strong><center>Message was unable to send!</center></strong>
          </div>
				";
			} else if(strlen($msg) > 100){
				echo"
          <div class='alert alert-danger'>
            <strong><center>Message is Too long! Use only 100 characters</center></strong>
          </div>
				";
			} else{
        $insert = "insert into users_chats(sender_username,receiver_username,msg_content,msg_status,msg_date) values ('$user_name','$username','$msg','unread',NOW())";
        
        $run_insert = mysqli_query($con,$insert);
			}
		}
	?>
</body>
</html>