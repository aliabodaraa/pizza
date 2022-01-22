<?php
include('config/db_connect.php');//for conn
//For Delete
if(isset($_GET['delete'])){
    // if(isset($_POST['delete'])){
    //     $id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);and the form below is POST
$id_to_delete=mysqli_real_escape_string($conn,$_GET['id_to_delete']);
$sql="DELETE FROM pizzas WHERE id= $id_to_delete ";

if(mysqli_query($conn,$sql)){
header('location:index.php');
echo "ALIABOSDARAA";
}else{
    //error
    echo "A query error" .mysqli_error($conn);
}
}

///111111111
 if(isset($_GET['id'])){//يعني هل الرقم ممرر بالمسار وهل جبت الصفحه
     echo "sddfsdf".$_GET['id'];
$id=mysqli_real_escape_string($conn,$_GET['id']);
//write A Query
$query="SELECT * FROM pizzas WHERE id = $id";//when you use ' ' give an error
//make A Query & GetResult
$result=mysqli_query($conn,$query);
//Fetch The Resulting Rows As An Array
$pizza=mysqli_fetch_assoc($result);//For One Row
mysqli_free_result($result);//free result from Memory
mysqli_close($conn);//close connection on DB
//print_r($pizza);
}else{
    echo "<h1>The List Pizza Is Empty</h1>";
}
?>
<html lang="en">
<?php require("template/header.php"); ?>

<div class="container center">
    <?php if($pizza) :?>
        <h4><?php echo htmlspecialchars($pizza['title']);?></h4>
        <p>Created By : <?php echo htmlspecialchars($pizza['email']);?></p>
        <h5>Ingredients :</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']);?></p>

        <form action="deatails.php" method="POST" >
        <!-- method="GET" is not false but redirect in the same page not in the action -->
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'];?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
        <?php else :?>
            <p>No Such Pizza Exsists</p>

            <?php endif ?>


</div>
<?php require("template/footer.php"); ?>
</html>
