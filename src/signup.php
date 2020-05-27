<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <title>Create new account!</title>
</head>

<body>
  <div class="signup-form">
    <form action="" method="post">
      <div class="form-header">
        <h2>Sign up</h2>
        <p>Please fill out this form and start chating with your friends!</p>
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="user_name"placeholder="Examle: Your Name" class="form-control" autocomplete="off" required>
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="user_pass"placeholder="Password" class="form-control" autocomplete="off" required>
      </div>
      <div class="form-group">
        <label for="">Email Address</label>
        <input type="email" name="user_email"placeholder="someone@site.com" class="form-control" autocomplete="off" required>
      </div>
      <div class="form-group">
        <label for="">Country</label>
        <select name="user_country" required  class="form-control">
          <option disabled="">Select a Country</option>
          <option>Germany</option>  
          <option>United States of America</option>
          <option>Norway</option>
          <option>UK</option>
          <option>France</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Gender</label>
        <select name="user_gender" required  class="form-control">
          <option disabled="">Select your gender</option>
          <option>Male</option>  
          <option>Female</option>
          <option>Others</option>
        </select>
      </div>
      <div class="form-group">
        <label for="" class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a> </label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign up</button>
      </div>
      <!-- <?php //include("signin_user.php"); ?> -->
    </form>
    <div class="text-class small" style="color: #674288;">Already have an account <a href="index.php">Signin here</a> </div>
  </div>
</body>

</html>