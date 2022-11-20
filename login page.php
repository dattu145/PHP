<?php error_reporting(0);
session_start();
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost','root','','sign1');

        $sql = "select * from sup where username='".$username."' and password='".$password."' limit 1";

        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($query); 

        if(mysqli_num_rows($query)==1){
            $sit = "success";
            $error = "Login Successful! Redirecting...";
            header("Location: https://waytoknow3.blogspot.com/2022/10/we-usually-hear-that-toppers-of-class.html");
        }
        else{
            $sit = "danger";
            $error = "It looks like you're not yet a member! <br> Click on the bottom like to signup. ";
        }

        if(empty($username) && empty($password)){
            $sit = "danger";
            $error = "Provide All the fields!";
        }
        else if(empty($username)){
            $sit = "danger";
            $error = "Provide Username to continue!";
        }
        else if(empty($password)){
            $sit = "danger";
            $error = "Provide Password to continue!";
        }
    }

}


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            padding: 40px 20px;
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
            width: 110px;
            height: 130px;
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
            padding: 0px 8px;
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
    </style>
<body>
<header id="bg"></header>
<div id="wrapper">
    <section id="title">
        LOGIN PAGE
    </section>
    <section id="inwrap">
    <nav id="imgoutlet">
    <img src="https://i.ibb.co/DYbXSYC/github-propic.png" alt="github-propic">    
    </nav>
    </section>
    <div id="report" class="alert alert-<?php error_reporting(1); echo $sit ?>" role="alert">
    <?php error_reporting(1); echo $error ?>
    </div>
    <section id="inwrap">
    <nav id="epoutlet">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Username :</label>
    <input type="text" name="username" id="email">
    </nav>
    <nav id="epoutlet">
    <label>Password :</label>
    <input type="password" name="password" id="password">
    </nav>
    </section>
    <section id="inwraprenfo">
    <nav id="renfo">
    <input type="checkbox" id="chk"><label id="rm" for="chk">Remember me</label></input>
    </nav>
    <nav id="renfo">
    <a href="#">Forget Password ?</a>
    </nav>
    </section>
    <section id="inwraplogin">
    <input id="login" type="submit" value="LOGIN" name="submit"></input>
    </form>
    </section>
    <section id="inwrapsignup">
    <a id="fm" href="form registration.php">Don't have an account? Sign up</a>
    </form>
    </section>
    </div>
</body>
<script>
const timeout = setTimeout(div, 3000);

function div(){
    document.getElementById("report").style.display="none";
}
</script>
</html>