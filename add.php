
<?php
// echo "<h1>ali aboudaraa</h1>";
// echo htmlspecialchars("<h1>ali aboudaraa</h1>");
// echo "<br>";
// if(isset($_POST['submit'])){
//     echo htmlspecialchars($_POST['email']);
//     echo htmlspecialchars($_POST['title']);
//     echo htmlspecialchars($_POST['ingredients']);
// }
//check email
include('config/db_connect.php');//because i need to the $conn


$email=$title=$ingredients='';
$errors=array('email'=>'','title'=>'','ingredients'=>'');
if(empty($_POST['email'])){

    $errors['email']= "this faild can't be Empty <br>";
}
else{
    //echo htmlspecialchars($_POST['email']);
    $email=$_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      //  $errors['email']="";
        $errors['email']= "email must be validate <br>";
    }
}
//check title
if(empty($_POST['title'])){
    $errors['title']= "this faild can't be Empty <br>";
}else{
    //echo htmlspecialchars($_POST['title']);
    $title=$_POST['title'];
    if(!preg_match("/^[a-zA-Z\s]+$/",$title)){// '/^chars you want+$/'
        $errors['title']= "title must be letter and space only <br>";
    }
}
//check ingredients
if(empty($_POST['ingredients'])){
    $errors['ingredients']= "this faild can't be Empty <br>";
}else{
    $ingredients=$_POST['ingredients'];
    if(!preg_match("/^([a-zA-Z\s])([,a-zA-Z\s])+$/",$ingredients)){
         //"/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/"
        $errors['ingredients']= "ingredients must be a comma separated list <br>";
    }
}
if(array_filter($errors)){
    //echo 'the form has an error';
}else{
    // echo 'the form is Valid';
    $email=mysqli_real_escape_string($conn,$_POST['email']); //for disable to effect this value when sending data to the DB
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']);
    //create SQL
    $sql="INSERT INTO pizzas(title,email,ingredients) VALUES ('$title','$email','$ingredients')";

    //Save To DB And Check
    if(mysqli_query($conn,$sql))
    {
      //Success
      header('location:index.php');
      echo "Success :";
    }else{
        //Error
        echo "Query Error :".mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html>
<?php require("template/header.php"); ?>


<section class="container gray-text">
    <h4 class="center">add a pizza</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="white">
        <label>Your Email :</label>
        <input name="email" type="text" value="<?php echo $_POST['email']; ?>" >
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>pizza title :</label>
        <input name="title" type="text" value="<?php echo $title; ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>ingredients :</label>
        <input name="ingredients" type="text" value="<?php echo $ingredients; ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>

</section>


<?php require("template/footer.php"); ?>
</html>
