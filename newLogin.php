<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://kit.fontawesome.com/b355688aeb.js" crossorigin="anonymous"></script>

<?php
session_start();

if(isset($_POST["submit"])){
	
	$url="localhost";
$db_name="test";
$username = 'asmit';
$password = 'root';

$conn = new mysqli($url, $username, $password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
else{
echo "connected";
}


    $site=$_POST["site"];
    $user_name=$_POST["user_name"];
	
    $password=$_POST["password"];
   
   //$query="Insert into user values('name',20,'gender',$user_name,$password,$site)";
    //$query= mysqli_query($conn,"INSERT INTO user VALUES(3,'name',20,'f','".$user_name."','".$password."','".$site."')");
   //$conn->query($query); 
    $ret= mysqli_query($conn,"SELECT * FROM user where site='$site' AND email='$user_name' AND password='$password'");
    $num=mysqli_fetch_array($ret);
   
   echo $num['site'];
   echo $num['email'];
   echo $num['password'];
  
    $sitename = $num['site'];
    $username = $num['email'];
    $pwd = $num['password'];

  

    if ($site == $sitename && $user_name == $username && $password == $pwd) {
		  $_SESSION['site'] =  $site;
		  $_SESSION['name'] =  $num['name'];
		  $_SESSION['site'] =  $site;
        echo "<script> 
                  alert('Welcome $user_name')
               </script>";
        header('Location: home.php');
    }
    
    elseif($site==""){
       echo "<script>alert('Choose Site')</script>";
    }

    elseif($user_name==""){
       echo "<script>alert('Enter USername')</script>";
  
     }
     elseif($password==""){
        echo "<script>alert('Enter Password ')</script>";
      
     }
     else{
        echo "<script> alert('User not found')</script>" ;
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-weight: 700;
            font-family: 'Titillium Web',sans-serif;
           margin-top: 30px;
           background-color: #F1EFEF;
           align-items:center;
          }

          .logo{
            padding-left:625px;
            margin-bottom: 10px;
          }
          .google{
            padding-left:80px;
          }
         
        .input{
            background-color:#F1EFEF;
            border: 1px solid gray;
            border-radius: 5px;
         width: 320px;
         height:45px;
        padding: 12px 16px;
        text-decoration: none;
        margin: 0px 2px;
        margin-left: 32px;
        }

       .login {
		position:absolute;
        margin: 25px 460px;
        height: 460px;
        width: fit-content;
        padding: 12px;
     }
     .heading{
        margin: 24px 0;
        text-align : center;
        font-size:20px;
     }
      .seperator{
        margin-left: 150px;
        padding: 30px;
      }
    
    .reset{
        padding: 20px;
        padding-left:210px;
    }
    .btn{
        background-color: #4f77ff;
        border: none;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }
	  .input-container {
            position: relative;
            display: inline-block;
        }

        .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
            cursor: pointer;
        } 
	 i:hover{
		 color:blue;
		 cursor:pointer;
	 }
		
    </style>

    <title>AWS Trial</title>
</head>

<body>

<div class="logo" ><img src="logo.png" alt="logo" width="100" height="60"></div>
<div class= "login" style="background-color: white;">
        <h1 class="heading" style="color:#4B527E;">AWS MANAGED SERVICES</h1>
        
    <form  method="post" class="form">
            <div class="google"> <img src="google_signin.png" alt="google" width="220" height="60"> </div>
           <div class="seperator"> OR </div>
           <select name= "site" id="site" class="input" >
           <option value="" selected> Select Site </option>
           <option value="DELHI"> DELHI </option>
           <option value="AGRA"> AGRA </option>

           </select>
           <br>
           <input type="email" name="user_name" class="input" id="user_name" placeholder="Email address" > <br>
           <div class="input-container">
        <input type="password" name="password" id="password" class="input" placeholder="Password">
        <i  class="fas fa-eye-slash icon"></i>
    </div>
           <div class="reset" style="color:#4f77ff; font-weight:100;"><a href="https://www.google.com" target="_blank">Recover Password?</a></div>
           <input type="submit" value="Login"  name="submit" class="input btn"/>
        
    </form>
    </div>
	
     <script>
        const icon = document.querySelector('.icon');

            icon.addEventListener('click', () => {
                const currentlyDisplayed = document.querySelector('.icon');
				const passwordInput = document.getElementById('password');
				
                if (currentlyDisplayed.classList.contains('fa-eye-slash')) {
                   currentlyDisplayed.classList.remove('fa-eye-slash');
				   currentlyDisplayed.classList.add('fa-eye');
				   passwordInput.type = 'text';
            } else {
                currentlyDisplayed.classList.remove('fa-eye');
				   currentlyDisplayed.classList.add('fa-eye-slash');
				    passwordInput.type = 'password';
            }
            });
		
    </script>
</body>

</html>