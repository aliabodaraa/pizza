
<?php
$conn=mysqli_connect('localhost','ali',999999999,'pizza-ali');
if(!$conn){
    echo "Connection Error".mysqli_connect_error();
}
//write A Query
$query='SELECT id,title,ingredients FROM pizzas';
//make A Query & GetResult
$result=mysqli_query($conn,$query);
//Fetch The Resulting Rows As An Array
$pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);//MYSQLI_ASSOCIATIVE
mysqli_free_result($result);//free result from Memory
mysqli_close($conn);//close connection on DB
print_r($pizzas);
//print_r(explode(',',$pizzas[0]['ingredients']));
// $ingr=explode(',',$pizzas[0]['ingredients']);

//pizza not exist
if(empty($pizzas)){
    echo "<h1 class='center red-text'>Not Exist Any Type Of Pizza !!!</h1>";
}
else{
    $ingr=explode(',',$pizzas[0]['ingredients']);
    print_r($ingr);
}
?>
<!DOCTYPE html>
<html>
<?php require("template/header.php"); ?>
<?php $count=0;?>
<h4 class="center grey-text">Pizzas!</h4>
<div class="container-fluid">
    <div class="row" style="padding: 20px 68px 29px 100px; ">
        <?php foreach($pizzas as $pizza){?>
        <div class="col-s6 md3">
            <div class="card z-depth-0" style="background-color: #f2d27ef2;
                                               padding: 0px;margin: 1px;">
                <div class="center">
                    <img src="imges/pizza.jpg" alt="imagePizza" class="center">
                </div>
                <div class="card-content center">
                   <?php echo "<h6 class='red-text'>".++$count."</h6 class='red'-text>";
                     echo htmlspecialchars($pizza['title']); ?>
                    <div>
                    <ul>
                        <?php $i=0;
                        $ingr=explode(',',$pizzas[$i]['ingredients']);
                        echo htmlspecialchars($pizzas[$i]['ingredients']);
                        echo '<br>';
                        print_r ($ingr)  ?>
                        
                        <?php foreach($ingr as $ingr1) :?>
                        <li>
                            <?php
                            echo $ingr1;
                            ++$i;
                            ?>
                        </li>
                        <?php endforeach?>
                    </ul>
                   <?php  print_r($pizza['ingredients']); ?></div>

               </div>
               <div class="card-action right-align">
                   <a href="deatails.php?id=<?php echo $pizza['id'];?>" class="brand-text" style=" color:#fff;">More Information</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php require("template/footer.php"); ?>
</html>
