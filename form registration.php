<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<?php error_reporting(0);
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpass'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $pass= password_hash($password, PASSWORD_BCRYPT);
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];

    $conn = mysqli_connect('localhost','root','','sign1');

    $sql = "INSERT INTO `sup` (`username`,`email`,`password`) VALUES ('$username ','$email','$password')";
    $all = "select * from sup where username='".$username."'";
    $res = mysqli_query($conn,$all);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
    }
       

    if(empty($username) || empty($email) || empty($password) || empty($cpass) || ($password != $cpass) || ($username==isset($row['username']))){
        $result = FALSE;
        $sit = "danger";
        $error = "username already exists try a new one!";
        if ($username== isset($row['username'])){
            $availability= "Username already exists";
        }
    }
    else{
        $result = mysqli_query($conn,$sql);
    }
    
    if($result){
        $sit = "success";
        $error = "You have registered Successfully! Redirecting...";
        // header("Location: login page.php");
    }
    else{
        $sit = "danger";
        $error = "Username already exists try a new one!";
    }

    if(empty($username)){
        $sit = "danger";
        $error = "Username is Required?";
        $availability = FALSE;
    }
    else if(empty($email)){
        $sit = "danger";
        $error = "Email is Required?";
    }
    else if(empty($password)){
        $sit = "danger";
        $error = "Password is Required?";
    }
    else if(empty($cpass)){
        $sit = "danger";
        $error = "Enter confirmed password to continue?";
    }
    else if($password != $cpass){
        $sit = "danger";
        $error = "passwords doesn't match!";
    }
}
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto:wght@300&display=swap" rel="stylesheet">
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Josefin Sans', sans-serif;
            /*background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);*/
        }
        section{
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        div{
            display: flex;
            flex-direction: column;
            padding: 20px 20px;
            background: rgba(10, 10, 10,0.6);
            border-radius: 5px;
            margin: 20px;
            box-shadow: 1px 1px 2px black;
        }
        #title{
            align-items: center;
            font-weight: 700;
            font-size: 22px;
            color: white;
        }
        section nav{
            margin: 10px;
            color: white;
        }
        img{
            width: 140px;
            height: 135px;
            border-radius: 50%;
            box-shadow: 3px 3px 4px black;
            filter: saturate(0%);
        }
        #imgoutlet{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        section input{
            display: flex;
            flex-direction: column;
            float: right;
            margin-left: 10px;
            padding: 2px 10px;
            align-items: center;
            justify-content: center;
            outline: none;
        }

        #renfo{
            display: flex;
        }

        #renfo input{
            float: left;
            margin-right: 6px;
        }
        #inwraplogin input{
            display: flex;
            padding: 10px 10px;
            align-items: center;
            justify-content: center;
            margin-left: 0;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 900;
            transition: 0.3s;
        }
        #inwraplogin input:hover{
            background: rgba(10,10,10,0.3);
            color: white;
            border-radius: 5px;
        }
        #inwraprenfo{
            display: flex;
            flex-direction: row;
            background: orange;
            justify-content: space-between;
        }

        a{
            display: flex;
            text-decoration: none;
            font-size: 13px;
            align-items: center;
            padding: 5px 8px;
        }
        a:hover{
            text-decoration: underline;
        }
        #rm{
            cursor: pointer;
            color: black;
        }
        #bg{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: -100;
            height: 100%;
            opacity: 0.5;
            background-image: url("https://images.hdqwalls.com/download/landscape-trees-mountains-clouds-digital-art-38-1920x1080.jpg");
        }
        #fm{
            color: white;
            font-size: 15px;
        }
        #fm:hover{
            color: orange;
        }
        #error{
            display: flex;
            box-shadow: 2px 2px 2px black;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
    </style>
<body>
<header id="bg"></header>
<div id="wrapper">
    <section id="title">
        SIGN UP PAGE
    </section>
    <section id="inwrap">
    <nav id="imgoutlet">
    <img src="https://i.ibb.co/xFQkG2J/07f0f08c-5f4e-4a2c-9f75-eac19cd9f8f5.png" alt="github-propic" border="0">
    </section>
    <div id="report" class="alert alert-<?php error_reporting(1); echo $sit ?>" role="alert">
    <?php error_reporting(1); echo $error ?>
    </div>
    <section id="inwrap">
    <nav id="epoutlet">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Username :</label>
    <input type="text" name="username" id="username" placeholder="<?php echo $availability ?>">
    </nav>
    <nav id="epoutlet">
    <label>Email :</label>
    <input type="email" name="email" id="email" placeholder="<?php echo $emailava ?>">
    </nav>
    <nav id="epoutlet">
    <label>Password :</label>
    <input type="password" name="password" id="password">
    </nav>
    <nav id="epoutlet">
    <label>Confirm password :</label>
    <input type="password" name="cpass" id="cpassword">
    </nav>
    </section>
    <section id="inwraplogin">
    <input id="login" type="submit" value="SIGN UP" name="submit"></input>
    </form>
    </section>
    <section id="inwrapsignup">
    <a id="fm" href="login page.php">Already have a account? Log In</a>
    </form>
    </section>
    </div>
</body>
<script>
const timeOut = setTimeout(div, 3200);

function div(){
    document.getElementById("report").style.display = "none";
}

</script>
</html>