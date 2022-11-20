<?php
    if(isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost'/*==> name of the server*/,'root'/*==> user type*/,'',/*==> password of the database*/'sign up page'/*==> name of the database*/) or die(/*==> if any of these are wrong in detail then execute this code(die)*/"Connection failed:" . mysqli_connect_error()/*==> shows connection error*/);
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpass'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['cpass'];

            $sql = "INSERT INTO `sup` (`username`, `email`, `password`, `confirm password`) VALUES ('$username', '$email', '$password', '$confirmpassword')";

            $query = mysqli_query($conn,$sql);

            if($query) {
                echo '<div id="entrymsg" style="font-size: 50px;text-transform: uppercase;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);font-family: sans-serif;color: green">Entry Successful</div>';
            }
            else {
                echo '<div id="entrymsg" style="font-size: 50px;text-transform: uppercase;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);font-family: sans-serif;color: Red">Entry Unsuccessful</div>';
            }
        }
    }
?>