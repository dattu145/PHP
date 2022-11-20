<?php
    if(isset($_POST["name"]) || isset($_POST["age"])){
        if(preg_match("/[^A-Za-z'-]/",$_POST["name"])){
            die("Invalid name. Name Should be an alphabet");
        }
        echo "Hello " . $_POST["name"] . "<br>";
        echo "You are " . (int)$_POST["age"] . " years old";
        $num = 18;

        exit();
    }
?>

<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">
Name : <input type="text" name="name">
Age : <input type="text" name="age">
<input type="submit">
</form>
</body>
</html>