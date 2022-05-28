<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login/Signup</title>
<link rel="stylesheet" href="logS.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;600&display=swap" rel="stylesheet">
</head>

<style>
  body{
  margin: 0;
  padding: 0;
  background: #d9d9d9;
  background-size: cover;
  background-position: center;
  font-family: 'Oswald', sans-serif;
}
.loginbox{
  width: 320px;
  height: 420px;
  background: #fff;
  color: #000;
  top:50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 50px 30px;
  box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;}

h1{
  margin: -15;
  padding: 0 0 20px;
  color: rgb(230,0,0);
  text-align: center;
  font-size: 30px;
}
.loginbox p{
  margin: 0;
  padding:0;
  font-size: 18px;
  color: #000;
  font-weight: bold;
  text-align: left;
}
.loginbox input{
  width: 100%;
  margin-bottom: 20px;
}
.loginbox input[type="text"], input[type="password"]{
  border: none;
  border-bottom: 1px solid #000;
  background: transparent;
  outline: none;
  height: 40px;
  color: #000;
  font-size: 15px;
}
.loginbox input[type="submit"]{
  border: none;
  outline: none;
  height: 40px;
  background: rgb(230,0,0);
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
  cursor: pointer;
  background: rgb(230,0,0);
  color: #000;
}
.loginbox a{
  text-decoration: none;
  font-size: 13px;
  line-height: 20px;
  color: black;
}
.loginbox a:hover{
  color: rgb(230,0,0);
}
</style>





<body>
<?php
include 'dbcon.php';

if(isset($_POST['submit'])){
  $Username = $_POST['Username'];
  $Password = $_POST['Pass'];

  $name_search = " select * from signup where Username='$Username'";
  $query = mysqli_query($con,$name_search);
  $name_count = mysqli_num_rows($query);
  if($name_count){
    $name_pass = mysqli_fetch_assoc($query);
    $db_pass = $name_pass['Pass'];
    $pass_check = password_verify($Password,$db_pass);
    if($pass_check){
      ?> <script>
            alert("Login Successful");
          </script> 
        <?php
    }else{
      ?> <script>
            alert("Password Incorrect");
          </script> 
        <?php
    }
  }else{
    ?> <script>
            alert("Invalid Username");
          </script> 
        <?php
  }
}
?>
  <div class="loginbox">
    <h1>Login Here</h1>
    <form action="<?php
      echo htmlentities($_SERVER['PHP_SELF'])
       ?>" method="post">
        <p style="padding-top:25px">Username</p>
        <input type="text" name="Username" placeholder="Enter Username" required>
        <p>Password</p>
        <input type="password" name="Pass" placeholder="Enter Password" required>
        <input type="submit" name="submit" value="Login">
        <a href="#">Forgot password</a> <br>
        <a href="http://localhost/web/signup.php">Create a new account</a>
      </form>

  </div>

</body>
