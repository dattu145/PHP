<?php
if (isset($_REQUEST["name"]) || isset($_REQUEST["age"])){
    echo "Hi " . $_REQUEST["name"] . "<br>";
    echo "you are " . $_REQUEST["age"] . " years old";
    exit();
}
?>

<html>
    <body>
        <form action = "<?php $_PHP_SELF ?>" method="POST">
        Name : <input type="text" name="name">
        Age : <input type="text" name="age">
        <input type="submit">
</form>

<!-- new code from here -->

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit" name='submit'>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  // collect value of input field

  $name = $_POST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>
    </body>
</html>


