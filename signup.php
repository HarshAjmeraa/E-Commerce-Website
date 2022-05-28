<?php
session_start();
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Signup</title>
<link rel="stylesheet" href="sign.css">
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
  height: 610px;
  top: 50%;
  left: 50%;
  background: #fff;
  color: #000;
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
  font-size: 26px;
}
.loginbox p{
  margin: 0;
  padding:0;
  font-size: 16px;
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
  font-size: 14 px;
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
  line-height: 5px;
  color: black;
}
.loginbox a:hover{
  color: rgb(230,0,0);
}

</style>


<body>
  <?php
  include 'dbcon.php';
if(isset($_POST['submit'])) 
{
        $Username =$_POST['Username'];
        $FirstName =$_POST['FirstName'];
        $LastName =$_POST['LastName'];
        $Email =$_POST['Email'];
        $Password =$_POST['Pass'];

        $pass = password_hash($Password, PASSWORD_BCRYPT);
        $emailq = "select * from signup where Email='$Email'";
        $query = mysqli_query($con,$emailq);
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0){
          ?> <script>
            alert("Email already exists");
          </script> 
        <?php
        }else{
          $sql = "INSERT INTO signup (Username, FirstName, LastName, Email, Pass) VALUES
          ('$Username', '$FirstName', '$LastName','$Email','$pass')";
          
          $rs = mysqli_query($con, $sql);
          if($rs)
          {
          echo "Successfully saved";
          }
        }
        mysqli_close($con);
        }
?>
  <div class="loginbox">
    <h1>Signup Here</h1>
      <form action="<?php
      echo htmlentities($_SERVER['PHP_SELF'])
       ?>" method="post">
        <p style="padding-top:25px">Username</p>
        <input type="text" name="Username" placeholder="Enter Userame" required>
        <p>First Name</p>
        <input type="text" name="FirstName" placeholder="Enter First Name" required >
        <p>Last Name</p>
        <input type="text" name="LastName" placeholder="Enter Last Name" required>
        <p>Email</p>
        <input type="text" name="Email" placeholder="Enter Email" required>
        <p>Password</p>
        <input type="password" name="Pass" placeholder="Enter Password" required>
        <input type="submit" name="submit" value="Signup">
        <a href="http://localhost/web/login.php">Already have an account?</a>
      </form>
      
  </div>

</body>
</html>


